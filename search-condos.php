<?php include 'search-results.php' ?>

<?php startblock('content')?>
<div class="py-5 gradient-overlay" style="background-image: url(&quot;https://pingendo.github.io/templates/sections/assets/cover_event.jpg&quot;);">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="">Explore taft2GO</h1>
            </div>
        </div>
        <?php startblock('searchCondos')?>
        <div class="row">
            <div class="col-md-4 text-white">
                <h2 class="">Condominiums</h2>
                <a class="btn btn-primary baloo" href="/taft2GO/Condominiums">Condos</a>
            </div>
            <?php endblock()?>

            <?php startblock('searchDorms')?>
            <div class="col-md-4 text-white">
                <h2 class="">Dormitories</h2>
                <a class="btn btn-primary baloo" href="/taft2GO/Dormitories">Dorms</a>
                <p class="lead"> </p>
            </div>
            <?php endblock() ?>

        </div>
    </div>
</div>


<!-- CONDOS -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="baloo">Condominiums
                    <br> </h1>
            </div>
        </div>
        <div id="condos" class="row">

        </div>
    </div>
</div>





<script>
    $(document).ready(function(){
        (function update(){
            $.ajax({
                type: "GET",
                url: "http://localhost:8080/taft2GO/listing",
                dataType: "json",
                success: function(response){

                    const jsonArray = response._embedded;
                    console.log(jsonArray);
                    console.log(jsonArray.length);
                    var condos = '';
                    var dorms = '';

                    for(var i = 0; i < jsonArray.length; i++){
                        console.log("looped");
                        console.log(jsonArray[i].type);
                        if(jsonArray[i].type == 'condo'){
                            console.log("added condo");
                            condos += '<div class="col-md-3">'
                                + '<a href="room-page.php?listingID='+ jsonArray[i]._id.$oid +'">'
                                //+ '<a href="/taft2GO/Listings/'+ jsonArray[i]._id.$oid +'">'
                                + '<img class="img-fluid d-block" src="'+ jsonArray[i].photo +'"><br>'
                                + '<h3>'+ jsonArray[i].title +'</h3>'
                                + '<p>Monthy Rate of Php'+ jsonArray[i].monthlyRate +'</p>'
                                + '<p>User Rating: '+ jsonArray[i].aveRating +'</p>'
                                + '</a>'
                                + '</div>';
                        }
                        else if(jsonArray[i].type == 'dorm'){
                            console.log("added dorm");
                            dorms += '<div class="col-md-3">'
                                + '<a href="room-page.php?listingID='+ jsonArray[i]._id.$oid +'">'
                                //+ '<a href="/taft2GO/Listings/'+ jsonArray[i]._id.$oid +'">'
                                + '<img class="img-fluid d-block" src="'+ jsonArray[i].photo +'"><br>'
                                + '<h3>'+ jsonArray[i].title +'</h3>'
                                + '<p>Monthy Rate of Php'+ jsonArray[i].monthlyRate +'</p>'
                               // + '<p>User Rating: '+ jsonArray[i].aveRating +'</p>'
                                + '</a>'
                                + '</div>';
                        }
                    }
                    $('#condos').html(condos);
                    $('#dorms').html(dorms);
                },
                error: function(jqXHR, exception){
                    console.log("Error");
                    console.log(jqXHR.responseText);
                }
            }).then(function(){
                console.log('orayt called set timeout');
                setTimeout(update, 5000);
            });
        })();

    });
</script>
<?php endblock() ?>

