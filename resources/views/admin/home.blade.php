@include('admin.head')

<body>
  <div class="container-scroller">

    @include('admin.sidebar')

    <div class="container-fluid page-body-wrapper">

      @include('admin.navbar')

      <div class="main-panel">

        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Registrations</h4>

                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Status</th>
                          <th>Approve</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->phone_number }}</td>
                          <td class="status-badge" data-user-id="{{ $user->id }}">
                            @if($user->isApprove)
                            <div class="badge badge-outline-success">Approved</div>
                            @else
                            <div class="badge badge-outline-warning">Pending</div>
                            @endif
                          </td>
                          <td>
                            <input type="checkbox"
                              class="approve-checkbox"
                              data-user-id="{{ $user->id }}"
                              {{ $user->isApprove ? 'checked' : '' }}>
                          </td>
                          <td>
                            <a href="{{ url('/users/'.$user->id) }}" class="btn btn-sm btn-info">
                              <i class="fa fa-eye"></i>
                            </a>


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
        </div>

        @include('admin.footer')
      </div>


    </div>

  </div>

  @include('admin.script')
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Approve checkbox
    $('.approve-checkbox').change(function() {
      let userId = $(this).data('user-id');
      let isApproved = $(this).is(':checked') ? 1 : 0;

      $.ajax({
        url: '/users/' + userId + '/approve',
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          isApprove: isApproved
        },
        success: function(response) {
          let badgeCell = $('.status-badge[data-user-id="' + userId + '"]');
          if (isApproved) {
            badgeCell.html('<div class="badge badge-outline-success">Approved</div>');
          } else {
            badgeCell.html('<div class="badge badge-outline-warning">Pending</div>');
          }
        },
        error: function(xhr) {
          alert('Failed to update approval status.');
          console.log(xhr.responseText);
        }
      });
    });

    // View user details
    $('.view-user').click(function() {
      let userId = $(this).data('id');

      $.ajax({
        url: '/users/' + userId,
        method: 'GET',
        success: function(response) {
          console.log(response); // Debugging
          $('#userDetails').html(response.html);
          $('#viewUserModal').modal('show');
        },
        error: function(xhr) {
          alert('Failed to fetch user details.');
          console.log(xhr.responseText);
        }
      });
    });
  });
</script>

</html>