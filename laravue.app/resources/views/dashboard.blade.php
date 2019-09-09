@extends('app')

@section('content')

      <div id="app" class="container">
        <div class="row">

          <div class="col-9">
            <h1 class="h5">laravue</h1>
          </div>
          <div class="col-sm-7">
            <a href="#" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#create">
            Nueva Tarea
            </a>
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th colspan="3">Tarea</th>
                  <th>
                    &nbsp;
                  </th>
                </tr>
              </thead>
              <tbody v-for="keep in keeps">
                <tr>
                  <td width="10px">@{{keep.id}}</td>
                  <td>@{{keep.keep}}</td>
                  <td>
                    <a href="#"class="bt btn-warning btn-sm" v-on:click.prevent="editKeep(keep)">editar</a>
                  </td>
                  <td>
                    <a href="#"class="bt btn-danger btn-sm" v-on:click.prevent="deleteKeep(keep)">eliminar</a>
                  </td>
                </tr>
              </tbody>
            </table>
            <nav aria-label="Page navigation example">
              <ul class="pagination">

                <li v-if="pagination.current_page" >
                  <a class="page-link" href="#"  @click.prevent="changePage(pagination.current_page - 1)">Atras</a>
                </li>

                <li class="page-item" v-for="page in pagesNumber" v-bind:class="[page == isActived ? 'active' : '']">

                  <a class="page-link" href="#" @click.prevent="changePage(page)">
                    @{{page}}
                  </a>

                </li>

                <li v-if="pagination.current_page < pagination.last_page" class="page-item">
                  <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">Siguiente</a>
                </li>

              </ul>
            </nav>
            @include('create')
            @include('edit')
          </div>
          <div class="col-sm-5">
            <pre>
              @{{$data}}
            </pre>
          </div>
        </div>
      </div>
@endsection
