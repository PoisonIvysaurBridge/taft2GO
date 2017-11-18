<?php include 'base.php' ?>

<?php startblock('searchbar') ?>
    <input class="form-control mr-sm-2 baloo" type="text" placeholder="Find the right place...">
    <a href="/taft2GO/Search" class="btn btn-outline-primary baloo">Search</a>
<?php endblock() ?>

<?php startblock('content')?>
    <div id="coverphoto" class="py-5 gradient-overlay" style="background-image: url(&quot;coverphoto.jpg&quot;);">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3 text-white">
                <!--<a class="btn btn-primary baloo" href="">View Photos</a>-->
            </div>
            <div class="col-md-9 text-white align-self-center"></div>
        </div>
    </div>
    </div>
    <div class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <h2 id="title" class="text-primary"></h2>
                <p id="description" class=""></p>
                <p id="aveRating"></p><br>
                <p id="type"></p>
                <p id="capacity"></p>
                <p id="rules"></p>
                <p id="beds"></p>
                <p id="bathrooms"></p>
                <p id="monthlyRate"></p>
                <p id="amenities"></p>




            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white"> From&nbsp;₱1,185 per night&nbsp;</div>
                    <div class="card-body">
                        <div class="card-body p-5">
                            <h3 class="pb-3">Make a reservation</h3>
                            <form action="https://formspree.io/YOUREMAILHERE">
                                <div class="form-group"> <label>Check in</label>
                                    <input type="date" class="form-control"> </div>
                                <div class="form-group"> <label>Check out</label>
                                    <input type="date" class="form-control"> </div>
                                <div class="form-group"> <label>People</label>
                                    <input type="number" class="form-control" placeholder="2"> </div>
                                <a class="btn btn-primary baloo" href="bookroom.html">Request to Book</a>
                            </form>
                        </div>
                        <h6 class="text-muted">You won't be charged yet.</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="baloo">Reviews</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-primary pt-3 baloo"><i class="fa fa-user fa-fw"></i>Person 1</h2>
                <p class="">October 24, 2017</p>
                <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h2 class="text-primary pt-3 baloo"><i class="fa fa-user fa-fw"></i>Person 2</h2>
                <p class="">October 24, 2017</p>
                <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
    </div>

    <script>
        function getURLParameter(name) {
            return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
        }



        $(document).ready(function(){
            var listingID = getURLParameter('listingID');
            console.log(listingID);

            $.ajax({
                type: "GET",
                url: "http://localhost:8080/taft2GO/listing/?filter={'_id': {'$oid': '" + listingID +"'}}",
                dataType: "json",
                success: function(response){
                    // get the object in listing
                    console.log(response._embedded);
                    var title = response._embedded[0].title;
                    var description = response._embedded[0].description;
                    var address = response._embedded[0].address;
                    var type = response._embedded[0].type;
                    var photo = response._embedded[0].photo;
                    var capacity = parseInt(response._embedded[0].capacity);
                    var rules = response._embedded[0].rules;
                    var beds = parseInt(response._embedded[0].beds);
                    var bathrooms = parseInt(response._embedded[0].bathrooms);
                    var amenities = response._embedded[0].amenities;
                    var monthlyRate = parseFloat(response._embedded[0].monthlyRate);
                    var status = response._embedded[0].status;
                    var aveRating = response._embedded[0].aveRating;


                    $('#title').html(title);
                    $('#description').html(description);
                    $('#type').html('Listing Type: '+type);
                    $('#capacity').html('Capacity: '+capacity);
                    $('#rules').html('House Rules: <br>'+rules);
                    $('#beds').html('No. of beds: '+beds);
                    $('#bathrooms').html('No. of bathrooms: '+bathrooms);
                    $('#aveRating').html('Rating: '+aveRating);
                    $('#amenities').html('Amenities: <br>'+amenities);
                    $('#coverphoto').css("background-image","url("+ photo +")");
                },
                error: function(jqXHR, exception){
                    console.log("Error");
                    console.log(jqXHR.responseText);
                }
            });
        });

    </script>
<?php endblock() ?>