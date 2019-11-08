@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Contacto  contactos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('contacto.create') }}" class="btn btn-info" >Añadir Contacto</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>direccion</th>
               <th>telefono</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($contactos->count())  
              @foreach($contactos as $contacto)  
              <tr>
                <td>{{$contacto->nombre}}</td>
                <td>{{$contacto->direccion}}</td>
                <td>{{$contacto->telefono}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ContactoController@edit', $contacto->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ContactoController@destroy', $contacto->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
      {{ $contactos->links() }}
    </div>
  </div>
</section>
 
@endsection