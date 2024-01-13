@include('layouts.dashboardLayout.header')
@include('layouts.dashboardLayout.sidebar')
@include('layouts.dashboardLayout.body')
<div class="row" style="margin-top: 20px;">

    <div class="col-12 col-xl-4">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top" data-background="../assets/img/profile-cover.jpg">
                    </div>
                    <div class="card-body pb-5">
                        <img src="../assets/img/team/profile-picture-1.jpg"
                            class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                        <h4 class="h3">{{$user->name}}</h4>
                        <h5 class="fw-normal">Senior Software Engineer</h5>
                        <p class="text-gray mb-4">New York, USA</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-8">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">General information</h2>
            <form method="POST" action="{{ route('update_profile', ['id' => Auth::user()->id]) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name"> Name</label>
                            <input class="form-control" value="{{$user->name}}" name="name" type="text"
                                placeholder="Enter your first name" >
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" value="{{$user->email}}" name="email" type="email"
                                disabled>
                        </div>
                    </div>
                </div>

                <h2 class="h5 my-4">Location</h2>
                <div class="row">
                    <div class="col-sm-8 mb-3">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input class="form-control" value="{{$user->address}}" name="address" type="text"
                                placeholder="Enter your home address" >
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" name="number" value="{{$user->number}}" type="number" placeholder="+12-345 678 910" >
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input class="form-control" value="{{$user->city}}" name="city" type="text" placeholder="City" >
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="zip">ZIP</label>
                            <input class="form-control" name="zip" value="{{$user->zip}}" type="tel" placeholder="ZIP" >
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update</button>
                </div>
            </form>
        </div>

    </div>

</div>
@include('layouts.dashboardLayout.footer')
