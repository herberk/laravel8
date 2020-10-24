<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use App\Models\empresas;
use Log;
use App\Http\Requests\TodoFormRequest;
use DB;
use App\TodoModel;
use Exception;

class FormComponent extends Component
{

    public $submit_btn_title = "Nueva Tarea";
    public $form = [
        "todo_id" => NULL,
        "title" => "",
        "desc" => "",
        "status" => "",
        "empresas_id" =>"",
        "fevento"   =>"",
    ];

    public $listeners = [
        "edit" => "edit"
    ];


    public function mount(){

    }

    public function edit($todo_id){
        try {
            $this->submit_btn_title = "Modificar Tarea";
            $todo = TodoModel::find($todo_id);
            $this->form = $todo->toArray();
        } catch (Exception $ex) {

        }
    }

    public function save(){
        $form = new TodoFormRequest();
        $form->merge($this->form);
        $validated_data = $form->validate($form->rules());

        DB::beginTransaction();
        try {
            $query = [
                "title" => $validated_data["title"],
                "desc" => $validated_data["desc"],
                "status" => $validated_data["status"],
                "empresas_id" => $validated_data["empresas_id"],
//                "fevento"   =>  $validated_data["fevento"],
                 "fevento" => DATE_FORMAT( date_create($validated_data["fevento"]),"Y/m/d H:i:s"),
            ];

            $condition = [
                "todo_id" => $validated_data["todo_id"]
            ];

            $info["todo"] = TodoModel::updateOrCreate($condition, $query);

            DB::commit();
            $info['success'] = TRUE;
        } catch (\Exception $e) {
            DB::rollback();
            $info['success'] = FALSE;
        }


        if($info["success"]){
            $type = "success";
            if($info["todo"]->wasRecentlyCreated){
                $message = "Nueva tarea creada, correctamente";
            }else{
                $message = "Tarea actualizada, corretamente";
            }

            $this->submit_btn_title = "Guardar Tarea";

        }else{
            $type = "error";
            $message = "Algo salió mal al guardar la tarea.";
        }

        $this->emitTo('todo.todo-notification-component', 'flash_message', $type, $message);

        $this->emitTo('todo.list-component', 'load_list');
    }

    public function render()
    {
        return view('livewire.todo.create_form',[
            'empresas' => empresas::where('active',"1")->get(),
            'todos' => TodoModel::with('empresas')
               ->get(),
        ] );
    }
}
