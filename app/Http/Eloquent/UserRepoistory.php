<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\UserRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepoistory implements UserRepositoryInterface
{

    use Image;

    public function index($dataTable)
    {
        return $dataTable->render('Task.pages.Users.index');
    }

    public function create()
    {
        return view('Task.pages.Users.components.include.add');
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store($request)
    {
        if($request->hasFile('image'))
        {
            $image = $this->imageUpload('users',$request->file('image'));
            $request->request->add(['photo'=>$image]);
        }
        $request->merge(['password'=>Hash::make($request->password)]);
        $user = User::create($request->only(['name','email','password','photo']));
        if (!$user)
        {
            return 'error';
        }
        return 'done';

    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('Task.pages.Users.components.include.show',compact('data'));
    }

    public function edit($data)
    {
        $data = User::findOrFail($data);
        return view('Task.pages.Users.components.include.edit',compact('data'));
    }

    public function update($request,$id)
    {
        $data = User::find($id);
        if(!$data)
        {
            return 'error';
        }
        if($request->has('password'))
        {
            $request->merge(['password'=>Hash::make($request->password)]);
        }
        if($request->hasFile('image'))
        {
            $this->deleteImage('Task/Images/'.$data->photo);
            $image = $this->imageUpload('users',$request->file('image'));
            $request->request->add(['photo'=>$image]);
        }
        $user = $data->update($request->only(['name','email','password','photo']));

        if (!$user)
        {
            return 'error';
        }
        return 'done';
    }

    public function delete($model,$item)
    {
        $item = $model::find($item);
        if(!$item)
        {
            return 'error';
        }
        $this->deleteImage('Task/Images/'.$item->photo);
        $item->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        foreach ($data as $item)
        {
            $item = $model::findOrFail($item);
            $this->deleteImage('Task/Images/users/'.$item->photo);
            $item->delete();
        }
        return 'done';
    }


}
