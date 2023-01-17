<h1>Update Actor</h1>
<hr>
<div class="mt-3">
    <form id="update-form" action="<?= site_url('/updateactor'); ?>" method="post" name="updateactor">
    <input type="hidden" name="id" id="id" value="<?php echo $person_obj['id']; ?>">
    <div class="form-group">
        <label for="name"> Name </label>
        <input type="text" name="name" class="form-control" value="<?php echo $person_obj['name']; ?>">
    </div>

    <div class="form-group">
        <label for="address"> Address </label>
        <textarea name="address" class="form-control" rows="5" > <?= $person_obj['address'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="sex"> Sex </label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" value="1" <?=($person_obj['sex']=="1" ? "checked" : ""); ?> id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" value="2"<?=($person_obj['sex']=="2" ? "checked" : ""); ?>  id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="birthday"> Birthday </label>
        <input type="date" name="birthday" value="<?php echo $person_obj['birthday']; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="age"> Age </label>
        <input type="text" name="age" value="<?php echo $person_obj['age']; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="activity"> Activity </label>
        <select class="form-select" name="activity" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="Sport" <?=($person_obj['activity']=="Sport" ? "selected" : ""); ?> >Sport</option>
            <option value="Movie" <?=($person_obj['activity']=="Movie" ? "selected" : ""); ?> >Movie</option>
            <option value="Music" <?=($person_obj['activity']=="Music" ? "selected" : ""); ?> >Music</option>
            <option value="Games" <?=($person_obj['activity']=="Games" ? "selected" : ""); ?> >Games</option>
            <option value="Shopping" <?=($person_obj['activity']=="Shopping" ? "selected" : ""); ?> >Shopping</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image"> Image </label>
        <input type="text" name="image" value="<?php echo $person_obj['image']; ?>" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success mt-2" value="Add Data">
        <a href="/actorlist" class="btn btn-primary mt-2">Back</a>
    </div>

</div>