<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="filter">

    <!-- Modal content -->
    <div class="filter-content">
        <span class="closeBtn">&times;</span>

        <div class="modalContainer">
            <form id="checkboxAll" method="get" action="{{ route('products') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <h4 class="title4">Kelime</h4>
                        <div class=" filterInput-group-icon col-half">
                            <input type="text" name="keyword_filter" placeholder="Kelime ile filtrele"
                                class="filterInput" />
                            <div class="input-icon"><i class="fa fa-font"></i></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 class="title4">Fiyat</h4>
                        <div class="filterInput-group">
                            <div class="col-half filterInput-group-icon">
                                <input type="number" name="minPrice" placeholder="min: 100" value="1"
                                    class="filterInput" />
                                <div class="input-icon">₺</div>
                            </div>
                            <div class="col-half filterInput-group-icon">
                                <input type="number" name="maxPrice" placeholder="max: 500" value="999999999"
                                    class="filterInput" />
                                <div class="input-icon"><i>₺</i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 class="title4">Cinsiyet</h4>
                        <div class="col-third">
                            <input id="gender-unisex" name="gender" type="radio" value="unisex" 
                                class="filterInput" />
                            <label for="gender-unisex" class="filterRadio"><i
                                    class="fas fa fa-venus-mars"></i>Tümü</label>
                        </div>
                        <div class="col-third">
                            <input id="gender-male" name="gender" type="radio" value="female" class="filterInput" />
                            <label for="gender-male" class="filterRadio">
                                <i class="fas fa fa-mars"></i>Kadın</label>
                        </div>
                        <div class="col-third">
                            <input id="gender-female" name="gender" type="radio" value="male"
                                class="filterInput" />
                            <label for="gender-female" class="filterRadio"><i
                                    class="fas fa fa-mars"></i>Erkek</label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col ">
                        <div class="col-half ">
                            <h4 class="title4">RENK</h4>
                            <div  style="height: 100%" class="variationContent">
                                <div class="row ">
                                    <input id="color-all" onclick="allCheck();" type="checkbox" name="color_all[]" value="all" checked
                                        class="filterInput" />
                                    <label for="color-all" class="filterRadio">Tümü</label>

                                </div>
                                @foreach ($colors as $color)
                                    <div class="row">
                                        <input id="{{ $color->color }}" type="checkbox" name="color[]"
                                            class="filterInput" value="{{ $color->color }}" checked />
                                        <label for="{{ $color->color }}"
                                            class="filterRadio">{{ $color->color }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="row ">
                    @foreach (getFilterVariations($products) as $variation)
                        <div class="col-fourth ">
                            <h4 class="title4">{{ $variation}}</h4>
                            <div class="variationContent">
                            <div class="row ">
                                <input id="{{ $variation }}-all" type="checkbox"
                                    name="variation_all[]"
                                    value="{{ $variation }}" checked />
                                <label for="{{ $variation }}-all" class="filterRadio">Tümü</label>

                            </div>
                            @foreach (getFilterVariationValues($variation) as $variationValue)
                                <div class="row">
                                    <input id="{{ $variation }}-{{ $variationValue->value }}"
                                        type="checkbox" name="variation_filter[]" value="{{ $variationValue->value }}"
                                        checked />
                                    <label for="{{ $variation }}-{{ $variationValue->value }}"
                                        class="filterRadio">{{ $variationValue->value }}</label>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    @endforeach
                </div> --}}


                <button type="submit" name="filter" class="btn submitBtn" value="1">FİLTRELE</button>


                {{-- <div class="row">
                    <h4 class="title4">Terms and Conditions</h4>
                    <div class="filterInput-group">
                        <input id="terms" type="checkbox" />
                        <label for="terms">I accept the terms and conditions for signing up to this service, and hereby
                            confirm I have read the privacy policy.</label>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>

</div>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("filterBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closeBtn")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script type="text/javascript">

    checked = true;

    function allCheck() {
        var checkboxs = document.getElementsByName('color[]');
        if (checked == false) {
            checked = true
        } else {
            checked = false
        }
        for (var i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checked;
        }
    }
 
</script>
