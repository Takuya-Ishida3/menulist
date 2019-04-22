<form method="post" action="{{ action('ImagesController@store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <fieldset>
        <p>
            <input id="file" type="file" name="image" />

            @if ($errors->has('image'))
                {{ $errors->first('image') }}
            @endif
        </p>
    </fieldset>

    <input class="btn btn-primary" type="submit" value="アップロード" />
</form>