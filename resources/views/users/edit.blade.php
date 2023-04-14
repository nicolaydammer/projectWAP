<x-app-layout>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">





        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('patch')
                    {{--                    <textarea--}}
                    {{--                        name="message"--}}
                    {{--                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"--}}
                    {{--                    >{{ old('message', $chirp->message) }}</textarea>--}}


                    <input
                            type="text"
                            name="name"
                            value="{{old('message' ,$user->name)}}"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >
                    <input
                            type="text"
                            name="email"
                            value="{{old('message' ,$user->email)}}"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >



{{--                    @foreach($userRoles as $role)--}}
{{--                        <p>--}}
{{--                            <label>{{$role}}</label>--}}
{{--                            <input type="checkbox" name="{{$role}}" id="{{$role}}" value="{{$role}}" @if($user->hasRole($role)) checked @endif>--}}
{{--                        </p>--}}


{{--                    @endforeach--}}


                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Roles')" />
                        <select id="role" class="block mt-1 w-full" name="role">
                            @foreach(\Spatie\Permission\Models\Role::all()->reverse() as $role)
                                <option value="{{ $role->name }}" {{$user->hasRole($role) ? 'selected' : ''}}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('roles')" class="mt-2" />
                    </div>


                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    <div class="mt-4 space-x-2">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        <a href="{{ route('users.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>

        </div>



    </div>
</x-app-layout>