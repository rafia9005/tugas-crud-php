@extends('layout.head')

@section('content')
    <div class="max-w-7xl mx-auto mt-5">
        <div>
            <h1 class="font-bold text-3xl">Dashboard</h1>
            <a href="/logout">logout</a>
            <div>
                {{-- crud users --}}
                <table class="min-w-full border-collapse block md:table mt-5">
                    <thead class="block md:table-header-group">
                        <tr class="border border-gray-200 block md:table-row">
                            <th
                                class="bg-gray-100 p-2 text-gray-700 font-bold border border-gray-300 text-left block md:table-cell">
                                id</th>
                            <th
                                class="bg-gray-100 p-2 text-gray-700 font-bold border border-gray-300 text-left block md:table-cell">
                                name</th>
                            <th
                                class="bg-gray-100 p-2 text-gray-700 font-bold border border-gray-300 text-left block md:table-cell">
                                email</th>
                            <th
                                class="bg-gray-100 p-2 text-gray-700 font-bold border border-gray-300 text-left block md:table-cell">
                                created_at</th>
                            <th
                                class="bg-gray-100 p-2 text-gray-700 font-bold border border-gray-300 text-left block md:table-cell">
                                DELETE</th>
                                <th
                                class="bg-gray-100 p-2 text-gray-700 font-bold border border-gray-300 text-left block md:table-cell">
                                EDIT</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody class="block md:table-row-group">
                            <tr class="bg-white border border-gray-200 block md:table-row">
                                <td class="p-2 border border-gray-300 text-left block md:table-cell"> {{ $user->id }}
                                </td>
                                <td class="p-2 border border-gray-300 text-left block md:table-cell"> {{ $user->name }}
                                </td>
                                <td class="p-2 border border-gray-300 text-left block md:table-cell"> {{ $user->email }}
                                </td>
                                <td class="p-2 border border-gray-300 text-left block md:table-cell">
                                    {{ $user->created_at }}
                                </td>
                                <td class="p-2 border border-gray-300 text-left block md:table-cell">
                                    <a href="/delete/{{ $user->id }}">DELETE</a>
                                </td>
                                <td class="p-2 border border-gray-300 text-left block md:table-cell">
                                    <a href="{{ route('users.edit', $user->id) }}">EDIT</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    {{ $users->links() }}
                </table>
            </div>
            <div>
                <form action="{{ route('users.create') }}" method="POST"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-5">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                        <input type="password" name="password" id="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
