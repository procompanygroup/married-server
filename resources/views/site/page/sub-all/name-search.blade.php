<form action="{{ url($lang,'name-search') }}" id="name-search-form" name="name-search-form" method="post"
autocomplete="off">
@csrf
<div class="col-md-12 form-group"><label>اسم المستخدم </label>
    <input dir="auto" class="form-control  required text-right" name="name" id="name"
        value="" placeholder="ادخل اسم المستخدم ">
</div>
<input type="hidden" name="type" value="name">
<div class="submit-block text-center"><button type="submit" id="btn-name-search"
    class="btn btn-lg btn-primary btn-submit">بحث</button></div>
</form>