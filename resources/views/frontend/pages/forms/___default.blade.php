@extends('frontend.layout.main')
@section('content')
    <section class="sell-car-section pt-30">
        <div class="container">
            <h1 class="sell-header-title pb-10">POST AN AD</h1>
            <div class="row justify-content-center mb-30">
                <div class="col-xl-8 mb-30">
                    <div class="sell-add-info-area">
                        <div class="sell-add-info-header">
                            <h3 class="sell-add-info-title">SELECTED CATEGORY</h3>
                            <div class="change-cetagory-wrapper">
                                @include('frontend.pages.forms.breadcrumb')
                            </div>
                            <form class="sell-add-info-form">
                                <div class="row mb-30-none">
                                    <div class="col-xl-8 mb-30">
                                        <div class="sell-add-info-body-wrapper">
                                            <h3 class="sell-add-info-body-title">ADD SOME INFO</h3>
                                            <div class="form-group">
                                                <label>Advert title <span class="text--danger">*</span></label>
                                                <input type="text" name="ttle" class="form--control"
                                                    autocomplete="off">
                                                <div class="text-limit-area">
                                                    <span>Mention key features of your product (e.g. make, model, age,
                                                        type)</span>
                                                    <span>0 / 70</span>
                                                </div>
                                            </div>
                                            <div class="form-group2">
                                                <label>Explanation <span class="text--danger">*</span></label>
                                                <textarea class="form--control"></textarea>
                                                <div class="text-limit-area">
                                                    <span>Add information such as status, feature and reason for sale</span>
                                                    <span>0 / 1450</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Condition <span class="text--danger">*</span></label>
                                                <select class="form--control">
                                                    <option value="">Select</option>
                                                    <option value="new">New</option>
                                                    <option value="used">Used</option>
                                                    <option value="Re-Condition">Re Condition</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Authenticity <span class="text--danger">*</span></label>
                                                <select class="form--control">
                                                    <option value="">Select</option>
                                                    <option value="Original">Original</option>
                                                    <option value="Refurbished">Refurbished</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Vehicle type <span class="text--danger">*</span></label>
                                                <input type="text" value="" name="vehicle_type" placeholder="@lang('Vehicle Type')" class="form--control">
                                            </div>
                                            <div class="form-group">
                                                <label>Brand <span class="text--danger">*</span></label>
                                                <select class="form--control">
                                                    <option value="d">Select Brand</option>
                                                    <option value="abarth">abarth</option>
                                                    <option value="aiways">AIWAYS</option>
                                                    <option value="aixam">aixam</option>
                                                    <option value="alfa-romeo">Alfa Romeo</option>
                                                    <option value="alpina">alpine</option>
                                                    <option value="anadol">anadol</option>
                                                    <option value="aston-martin">Aston Martin</option>
                                                    <option value="audi">Audi</option>
                                                    <option value="bentley">Bentley</option>
                                                    <option value="bmw">BMW</option>
                                                    <option value="borgward">Borgward</option>
                                                    <option value="bugatti">Bugatti</option>
                                                    <option value="buick">Buick</option>
                                                    <option value="cadillac">Cadillac</option>
                                                    <option value="caterham">Caterham</option>
                                                    <option value="chery">Chery</option>
                                                    <option value="chevrolet">Chevrolet</option>
                                                    <option value="chrysler">Chrysler</option>
                                                    <option value="citroën">Citroen</option>
                                                    <option value="dacia">Dacia</option>
                                                    <option value="daewoo">daewoo</option>
                                                    <option value="daf">DAF</option>
                                                    <option value="daihatsu">Daihatsu</option>
                                                    <option value="dfsk">DFSK</option>
                                                    <option value="dodge">dodge</option>
                                                    <option value="dr-automobiles">DR Automobiles</option>
                                                    <option value="ds">ds</option>
                                                    <option value="ds-automobiles">DS Automobiles</option>
                                                    <option value="ferrari">Ferrari</option>
                                                    <option value="fiat">Fiat</option>
                                                    <option value="ford">Ford</option>
                                                    <option value="geely">geely</option>
                                                    <option value="gmc">GMC</option>
                                                    <option value="honda">Honda</option>
                                                    <option value="hummer">Hummer</option>
                                                    <option value="hyundai">Hyundai</option>
                                                    <option value="infiniti">Infiniti</option>
                                                    <option value="isuzu">Isuzu</option>
                                                    <option value="italdesign">italdesign</option>
                                                    <option value="iveco">Iveco</option>
                                                    <option value="jaguar">Jaguar</option>
                                                    <option value="jeep">jeep</option>
                                                    <option value="kia">Kia</option>
                                                    <option value="ktm">KTM</option>
                                                    <option value="lada">Lada</option>
                                                    <option value="lamborghini">Lamborghini</option>
                                                    <option value="lancia">Lancia</option>
                                                    <option value="land-rover">Land Rover</option>
                                                    <option value="lexus">Lexus</option>
                                                    <option value="lincoln">Lincoln</option>
                                                    <option value="lotus">Lotus</option>
                                                    <option value="lynk-&amp;-co">Lynk &amp; Co.</option>
                                                    <option value="man">MAN</option>
                                                    <option value="maserati">Maserati</option>
                                                    <option value="maxus">Maxus-</option>
                                                    <option value="mazda">Mazda</option>
                                                    <option value="mclaren">McLaren</option>
                                                    <option value="mercedes-benz">Mercedes-Benz</option>
                                                    <option value="mercury">Mercury</option>
                                                    <option value="mg">MG</option>
                                                    <option value="mini">MINI</option>
                                                    <option value="mitsubishi">Mitsubishi</option>
                                                    <option value="moskwitch">Moskwitch</option>
                                                    <option value="nio">NIO</option>
                                                    <option value="nissan">Nissan</option>
                                                    <option value="oldsmobile">oldsmobile</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="pagani">pagan</option>
                                                    <option value="peugeot">Peugeot</option>
                                                    <option value="piaggio">Piaggio</option>
                                                    <option value="plymouth">Plymouth</option>
                                                    <option value="polestar">polestar</option>
                                                    <option value="pontiac">pontiac</option>
                                                    <option value="porsche">Porsche</option>
                                                    <option value="proton">Proton</option>
                                                    <option value="renault">Renault</option>
                                                    <option value="rolls-royce">Rolls Royce</option>
                                                    <option value="rolls-royce-1">Rolls-Royce</option>
                                                    <option value="rover">rover</option>
                                                    <option value="saab">saab</option>
                                                    <option value="samand">straw</option>
                                                    <option value="scion">scion</option>
                                                    <option value="seat">seat</option>
                                                    <option value="škoda">Škoda</option>
                                                    <option value="skyworth">skyworth</option>
                                                    <option value="smart">smart</option>
                                                    <option value="ssangyong">SsangYong</option>
                                                    <option value="subaru">Subaru</option>
                                                    <option value="suzuki">Suzuki</option>
                                                    <option value="swm">SWM</option>
                                                    <option value="tata">Tata</option>
                                                    <option value="tesla">Tesla</option>
                                                    <option value="tofas">Tofas</option>
                                                    <option value="toyota">Toyota</option>
                                                    <option value="tropos">tropos</option>
                                                    <option value="vauxhall">vauxhall</option>
                                                    <option value="volvo">Volvo</option>
                                                    <option value="vw">VW</option>
                                                    <option value="wey">WEY</option>
                                                    <option value="zhidou">Zhidou</option>
                                                    <option value="diğer">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Edition (Optional)</label>
                                                <input type="text" value="" name="edition"
                                                    class="form--control" placeholder="@lang('Edition')">
                                            </div>
                                            <div class="form-group">
                                                <label>Year of Manufacture</label>
                                                <input type="number" value="" name="year_of_manufacture"
                                                    class="form--control" placeholder="@lang('Year of Manufacture')">
                                            </div>
                                            @if ( $sub_category->category_type == "vehicles" && $sub_category->wheels > 2 )
                                            @include('frontend.pages.forms._4wheeler')
                                            @endif

                                            <div class="form-group">
                                                <label>Kilometer</label>
                                                <input type="number" name="kilometer" class="form--control">
                                            </div>
                                            <div class="form-group">
                                                <label>Number plate</label>
                                                <input type="text" name="number_plate" class="form--control">
                                            </div>
                                            <div class="form-group">
                                                <label>Fuel</label>
                                                <select class="form--control">
                                                    <option value="">@lang('Select')</option>
                                                    <option value="benzin">Gasoline</option>
                                                    <option value="benzin-lpg">Gasoline/LPG</option>
                                                    <option value="diesel">Diesel</option>
                                                    <option value="electric">Electric</option>
                                                    <option value="hybrid-benzin-electric">Hybrid (Gasoline/Electric)
                                                    </option>
                                                    <option value="hybrid-diesel-electric">Hybrid (Diesel/Electric)
                                                    </option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Color</label>
                                                <select class="form--control" name="color">
                                                    <option value="">@lang('Select')</option>
                                                    <option value="light-grey">Light grey</option>
                                                    <option value="light-blue">Light blue</option>
                                                    <option value="light-green">Light green</option>
                                                    <option value="beige">Beige</option>
                                                    <option value="white">White</option>
                                                    <option value="burgundy">burgundy</option>
                                                    <option value="brown">Brown</option>
                                                    <option value="red">Red</option>
                                                    <option value="dark-grey">Dark grey</option>
                                                    <option value="dark-blue">Dark blue</option>
                                                    <option value="dark-green">Dark green</option>
                                                    <option value="yellow">Yellow</option>
                                                    <option value="black">Black</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">SET PRICE</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group price-input-badge">
                                                <label>Price <span class="text--danger">*</span></label>
                                                <input type="number" name="price" class="form--control"
                                                    autocomplete="off">
                                                <span>₺</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @include('frontend.pages.forms._basic')
                                <div class="sell-add-info-price-wrapper">
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="sell-add-btn-area">
                                                <a href="sell-faster.html" class="btn--base">Advertise now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
