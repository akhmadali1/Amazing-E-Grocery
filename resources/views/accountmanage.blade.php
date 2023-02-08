@extends('template')

@section('title', 'Acount Maintanance')

@section('content')
<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    table.center {
      margin-left: auto;
      margin-right: auto;
    }
    </style>
<table class="text-center align-middle mx-auto">
    <tr>
      <th><u>Account</u></th>
      <th><u>Action</u></th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->first_name . ' ' .$user->last_name . ' - ' . $user->role }}</td>
        <td><a href="/maintenance/{{ $user->id }}">Update Role</a> <a href="/deleteacc/{{ $user->id }}"> Delete</a></td>
    </tr>
    @endforeach
  </table>
@endsection
