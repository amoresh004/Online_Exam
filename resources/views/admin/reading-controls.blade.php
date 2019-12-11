
@extends('layouts.adminMaster')


@section('title')

  | Admin Dashboard |

@endsection
  


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Reading Topic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form actiom="/save-reading" method="POST">
        {{ csrf_field() }}

      <div class="modal-body">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title :</label>
            <input type="text" name="title" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Documents:</label>
            <textarea name="documment" class="form-control" id="message-text"></textarea>
          </div>
       
        </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
       </form>
    </div>
  </div>
</div>

 <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Reading Contents Table</h4>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add Topic</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                   <table class="table">
                    <thead class=" text-primary">
                       <th> ID </th> 
                      <th> Title </th>
                      <th> Documment </th>
                      <th> Edit </th>
                      <th> Delete </th>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr>
                         <td> {{ $user->id }}</td>
                        <td> {{ $user->title }}</td>
                        <td> {{ $user->documment }} </td>
                        <td> 
                          <a href="/reading-edit/{{ $user->id }}" class="btn btn-success">Edit </a> 
                        </td>
                        <td> 
                          <form action="/reading-delete/{{ $user->id }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger">Delete </button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table> 
                </div>
              </div>
            </div>
          </div>
  </div>

@endsection


@section('scripts')



@endsection


