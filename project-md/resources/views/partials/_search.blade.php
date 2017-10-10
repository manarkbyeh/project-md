          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form action="{{url('/article/search')}}" method="post">
                 {!! csrf_field() !!}
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for...">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-secondary" type="button">Go!</button>
                </span>
              
              </div>
              </form>
            </div>
          </div>
