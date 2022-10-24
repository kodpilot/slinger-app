<style>
    *,
    *:before,
    *::after{
        box-sizing: border-box;
    }
    .special-popup{
        display: none;
        position: fixed;
        z-index: 99999;
        padding-top: 20vh;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        border-radius: 5px;
    }
    .popup-content{
       margin: auto;
       width: 70%;
    }
    .close-popup{
        color: #aaaaaa;
        float: right;
        font-size: 30px;
        font-weight: bold;
        margin: 10px 20px;
    }
    .close-popup:hover,
    .close-popup:focus{
        color: #000;
        text-decoration: none;
        cursor: pointer;
        
    }
    .popup-main-title{
        color: #000;
        font-size: 16px;
        text-align: center;
    }
    .popup-image-left{
        float: left;
        width: 100% !important;
        height: 300px;
        padding: 5px;

    }
    .popup-image-center{
        width: 100%;
        height: auto;
        padding: 5px;
        height: 300px;
        float: left;
    }
    .row{
        zoom: 1;
        margin-bottom: 10px;
    }
    .col-half{
        padding-right: 10px;
        float: left;
        width: 50%;
        display: block;
        text-align: center;

    }
    .col-mobile{
        width: 100%;
        display: none;
        text-align: center;
    }
    .col-12{
        float: left;
        width: 100%;
    }
    .popup-modal-container{
        width: 100%;
        padding: 3em 5em;
        margin: 0em auto;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
    }
    .popup-link-button{
        background-color: #000;
        color: #fff;
        border: none;
        padding: 5px;
        border-radius: 5px;
        font-size: 16px;
    }
    .popup-link-button:hover{
        background-color: #fff;
        color: #000;
    }

    @media only screen and (max-width:767px){
        .col-half{
            display: none
        }
        .col-mobile{
            display: block;
        }
        .popup-content{
            margin: auto;
            width: 90%;
        }
        .special-popup{
            padding-top: 10vh;
        }
    }

</style>


<div id="my-popup" class="special-popup">
    <div class="popup-content">
        <span id="close-button" class="close-popup">&times;</span>
        <div class="popup-modal-container">
            @foreach (getPopup() as $popup)
                
                <div class="popup-main-title">
                    <h3>{{$popup->title}}</h3>
                </div>

                @if ($popup->position == "Sol")
                    <div class="row">
                        <div class="col-half">
                          <a href="{{$popup->link}}"><img class="popup-image-left" src="{{url('assets/images/popups/'.$popup->file)}}" alt=""></a> 
                        </div>
                        <div class="col-half">
                            <p>{{$popup->description}}</p>
                            <a href="{{$popup->button_link}}" class="popup-link-button">{{$popup->button_name}}</a>
                        </div>
                        <div class="col-mobile">
                            <a href="{{$popup->link}}"><img class="popup-image-left" src="{{url('assets/images/popups/'.$popup->file)}}" alt=""></a> 
                        </div>
                        <div class="col-mobile">
                            <p>{{$popup->description}}</p>
                            <a href="{{$popup->button_link}}" class="popup-link-button">{{$popup->button_name}}</a>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <a href="{{$popup->link}}"><img class="popup-image-center" src="{{url('assets/images/popups/'.$popup->file)}}" alt=""></a> 
                        </div>
                        <div class="col-12">
                            <p>{{$popup->description}}</p>
                            <a href="{{$popup->button_link}}" class="popup-link-button">{{$popup->button_name}}</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<script>
    var modal2 = document.getElementById("my-popup");

    var button2 = document.getElementById("popup-button");

    var span2 = document.getElementById("close-button");

    button2.onclick = function () {
        console.log("click");
        modal2.style.display = "block";
        
    }

    span2.onclick = function () {
        modal2.style.display = "none";
        console.log("click");
    }
    
    window.onclick = function (event) {
        console.log(event.target)
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }

    window.onload = function () {
        modal2.style.display = "block";
    }
</script>