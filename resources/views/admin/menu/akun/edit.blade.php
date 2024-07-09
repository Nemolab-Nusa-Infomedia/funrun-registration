@extends('components.layout')

@section('content')
<div class="card p-3">
    <div class="d-flex d-flex justify-content-between">
        <span class="text-dark fw-bold fs-4">Edit Akun</span>
        <a href="{{ route('akun') }}"><button class="btn btn-info" type="button"><i class="fa-solid fa-arrow-left"></i> Back</button></a>
    </div>
    <div class="p-3 border rounded mb-2 mt-3">
        <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            {{-- @csrf --}}
            <div class="col-md-6">
                <label for="" class="form-label">Name User</label>
                <div class="input-group input-group-outline ">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" value="Vindra Arya Yulian">
                     {{-- @if ($errors->storing->has('name'))
                        <p class="invalid-feedback">{{ $errors->storing->first('name') }}</p>
                    @endif --}}
                </div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Role</label>
                <select class="form-select p-2" aria-label="Default select example" name="role_id">
                    <option selected>Choose Role</option>
                    {{-- @foreach ($roles as $key)
                    <option value="{{ $key->id }}">{{ $key->role }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Email</label>
                <div class="input-group input-group-outline">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" value="vindra@panitia.funrun.id">
                     {{-- @if ($errors->storing->has('email'))
                        <p class="invalid-feedback">{{ $errors->storing->first('email') }}</p>
                    @endif --}}
                </div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Password</label>
                <div class="input-group input-group-outline">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" value="aflowrigva#ks*&#7">
                     {{-- @if ($errors->storing->has('password'))
                        <p class="invalid-feedback">{{ $errors->storing->first('password') }}</p>
                    @endif --}}
                </div>
            </div>
            <div class="col-12">
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
