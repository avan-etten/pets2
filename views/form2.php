<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order2</title>
</head>
<body>
<!--Color-->
<label class="col-sm-1 control-label"
       for="color">Pet Color</label>

<div class="col-sm-3">
    <check if="{{@errors['colors']}}">
        <p>{{@errors['color']}}</p>
    </check>
    <select class="form-control" name="color">
        <option>--Select--</option>
        <repeat group="{{@colors}}" value="<?php echo'{{@colorOption}}'?> ">
            <option>
                <check if="{{@colorOption == @color}}">selected</check>
                {{@colorOption}}
            </option>

        </repeat>
    </select>
</div>

<form method="post" action="#">
    <label>Select A Color</label>
    <select name="color">
        <option>--Select a color--</option>
        <repeat group="{{@colors}}" value="{{@colorOption}}">
            <option>{{@colorOption}}</option>
        </repeat>
    </select>
    <button type="submit">Submit</button>
</form>

</body>
</html>