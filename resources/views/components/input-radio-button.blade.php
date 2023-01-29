@props(['name' => ''])
    <fieldset class="row mb-3 mt-8">
        <legend class="col-form-label col-sm-2 pt-0">Quality:</legend>
        <div class="flex">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="{{  $name }}" id="gridRadios1" value="Standard" checked>
            <label class="form-check-label" for="gridRadios1">
              Standard
            </label>
          </div>
          <div class="form-check ml-4">
            <input class="form-check-input" type="radio" name="{{  $name }}" id="gridRadios2" value=" premium">
            <label class="form-check-label mr-3" for="gridRadios2">
                premium
            </label>
          </div>

        </div>
      </fieldset>

