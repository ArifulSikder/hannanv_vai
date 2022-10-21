<div class="sell-add-info-price-wrapper">
    <div class="form-group col-8">
        <label>@lang('Condition')</label>
        <select class="form--control" name="condition">
            <option value="">@lang('Select')</option>
            <option value="new">New</option>
            <option value="used">Used</option>
            <option value="like new">Like new</option>
            <option value="reconditon">Reconditioned</option>
        </select>
    </div>
    <div class="form-group col-8">
        <label>@lang('Authenticity')</label>
        <select class="form--control" name="authenticity">
            <option value="">@lang('Select')</option>
            <option value="original">Original</option>
            <option value="refubrished">Refubrished</option>
        </select>
    </div>
    <div class="form-group col-8">
        <label>@lang('Brand ')</label>
        <input type="text" class="form--control" name="brand" placeholder="@lang('Brand ')">
    </div>
    <div class="form-group col-8">
        <label>@lang('Color ')</label>
        <select class="form--control" name="color">
            <option value="">@lang('Select Color')</option>
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

    <div class="form-group col-8">
        <label>@lang('Transmission')</label>
        <select class="form--control" name="transmission">
            <option value="">@lang('Select')</option>
            <option value="manual">Manual</option>
            <option value="automatic">Automatic</option>
            <option value="other_transmission">Other transmission</option>
        </select>
    </div>
    <div class="form-group col-8">
        <label>@lang('Body Type')</label>
        <select class="form--control" name="body_type">
            <option value="">@lang('Select')</option>
            <option value="saloon">Saloon</option>
            <option value="hatchback">Hatchback</option>
            <option value="estate">Estate</option>
            <option value="convertible">Convertible</option>
            <option value="coupe/Sports">Coupe/Sports</option>
            <option value="suv4x4">SUV/4X4</option>
            <option value="mpv">MPV</option>
            <option value="pick-up">pick-up</option>
            <option value="roadster">roadster</option>
            <option value="sedan">Sedan</option>
            <option value="suv">SUV</option>
            <option value="suv-cabriolet">SUV Cabriolet</option>
            <option value="other">Other</option>

        </select>
    </div>
    <div class="form-group col-8">
        <label>@lang('Edition') (@lang('Optional'))</label>
        <input type="text" name="edition" class="form--control" placeholder="@lang('Edition')">
    </div>
    <div class="form-group col-8">
        <label>@lang('Year of Manufacture')</label>
        <input type="text" name="year_of_manufacture" class="form--control" placeholder="@lang('Year of Manufacture')">
    </div>
    <div class="form-group col-8">
        <label>@lang('Kilometers run (km)') <span class="text-danger">*</span></label>
        <input type="text" name="run_km" class="form--control" placeholder="@lang('Kilometers run (km)')">
    </div>
    <div class="form-group col-8">
        <label>@lang('Engine capacity (cc)') <span class="text-danger">*</span></label>
        <input type="text" name="engine_cc" class="form--control" placeholder="@lang('Engine capacity (cc)')">
    </div>
    <div class="form-group col-8">
        <label>New safe/old safe (Optional)</label>
        <select class="form--control" name="year_decade">
            <option value="">@lang('Select')</option>
            <option value="1981-1991">1981 - 1991</option>
            <option value="1992-2002">1992 - 2002</option>
            <option value="2003-2013">2003 - 2013</option>
            <option value="2014-2024">2014 - 2024</option>
        </select>
    </div>
    <div class="form-group col-8">
        <label>Gear (Optional)</label>
        {{-- <div class="sell-add-info-radio-wrapper" >
            <div class="radio-item">
                <input type="radio" id="level-1" name="radio-group" autocomplete="off">
                <label for="level-1">direct drive</label>
            </div>
            <div class="radio-item">
                <input type="radio" id="level-2" name="radio-group" autocomplete="off">
                <label for="level-2">Straight</label>
            </div>
            <div class="radio-item">
                <input type="radio" id="level-3" name="radio-group" autocomplete="off">
                <label for="level-3">Automatic</label>
            </div>
            <div class="radio-item">
                <input type="radio" id="level-4" name="radio-group" autocomplete="off">
                <label for="level-4">Semiautomatic</label>
            </div>
            <div class="radio-item">
                <input type="radio" id="level-5" name="radio-group" autocomplete="off">
                <label for="level-5">Other</label>
            </div>
        </div> --}}
        <select class="form--control" name="gear">
            <option value="">@lang('Select')</option>
            <option value="direct drive">direct drive</option>
            <option value="straight">Straight</option>
            <option value="automatic">Automatic</option>
            <option value="semiautomatic">Semiautomatic</option>
            <option value="other">Other</option>
        </select>

    </div>
    <div class="form-group col-8">
        <label>Fuel Type</label>
        <div class="row mb-10-none">
            <div class="col-xl-6 mb-10">
                <div class="check-feature">
                    <input type="checkbox" class="w-auto me-2" name="fuel_type[]" autocomplete="off" value="diesel">
                    <span>Diesel</span>
                </div>
            </div>
            <div class="col-xl-6 mb-10">
                <div class="check-feature">
                    <input type="checkbox" class="w-auto me-2" name="fuel_type[]" autocomplete="off" value="petrol">
                    <span>Petrol</span>
                </div>
            </div>
            <div class="col-xl-6 mb-10">
                <div class="check-feature">
                    <input type="checkbox" class="w-auto me-2" name="fuel_type[]" autocomplete="off" value="cng">
                    <span>CNG</span>
                </div>
            </div>
            <div class="col-xl-6 mb-10">
                <div class="check-feature">
                    <input type="checkbox" class="w-auto me-2" name="fuel_type[]" autocomplete="off" value="hybrid">
                    <span>Hybrid</span>
                </div>
            </div>
            <div class="col-xl-6 mb-10">
                <div class="check-feature">
                    <input type="checkbox" class="w-auto me-2" name="fuel_type[]" autocomplete="off" value="electric">
                    <span>Electric</span>
                </div>
            </div>
            <div class="col-xl-6 mb-10">
                <div class="check-feature">
                    <input type="checkbox" class="w-auto me-2" name="fuel_type[]" autocomplete="off" value="octane">
                    <span>Octane</span>
                </div>
            </div>
            <div class="col-xl-6 mb-10">
                <div class="check-feature">
                    <input type="checkbox" class="w-auto me-2" name="fuel_type[]" autocomplete="off" value="lpg">
                    <span>LPG</span>
                </div>
            </div>
            <div class="col-xl-6 mb-10">
                <div class="check-feature">
                    <input type="checkbox" class="w-auto me-2" name="fuel_type[]" autocomplete="off" value="other">
                    <span>Other Fuel Type</span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-8">
        <label>Number of seats</label>
        <input type="text" value="1" name="seat_qty" min="1" placeholder="@lang('Number of seat')"
            class="form--control">
    </div>
    {{-- <div class="form-group col-8">
        <label>ENGINE</label>
        <select class="form--control">
            <option value="">@lang('Select')</option>
            <option value="0">0</option>
            <option value="0.5">0.5</option>
            <option value="0.7">0.7</option>
            <option value="0.8">0.8</option>
            <option value="0.8 cdi">0.8 cdi</option>
            <option value="0.9 8v TwinAir">0.9 8v TwinAir</option>
        </select>
    </div> --}}
    <div class="form-group col-8">
        <label>Traction</label>
        {{-- <div class="sell-add-info-radio-wrapper">
            <div class="radio-item">
                <input type="radio" id="wheel1" name="radio-group1" autocomplete="off">
                <label for="wheel1">4 wheel drive</label>
            </div>
            <div class="radio-item">
                <input type="radio" id="wheel2" name="radio-group1" autocomplete="off">
                <label for="wheel2">rear wheel drive</label>
            </div>
            <div class="radio-item">
                <input type="radio" id="wheel3" name="radio-group1" autocomplete="off">
                <label for="wheel3">front wheel drive</label>
            </div>
            <div class="radio-item">
                <input type="radio" id="wheel4" name="radio-group1" autocomplete="off">
                <label for="wheel4">Other</label>
            </div>
        </div> --}}
        <select class="form--control" name="traction">
            <option value="">@lang('Select')</option>
            <option value="4 wheel drive">4 wheel drive</option>
            <option value="rear wheel drive">rear wheel drive</option>
            <option value="front wheel drive">front wheel drive</option>
            <option value="other">Other</option>
        </select>
    </div>
</div>
