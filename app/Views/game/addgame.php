<h1>Add Game</h1>
<hr>
<div class="mt-3">
    <form id="add-form" action="<?= site_url('/game-form'); ?>" method="post" name="addgame">
    <div class="form-group">
        <label for="name"> Name </label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="detail"> Detail </label>
        <textarea name="detail" class="form-control" rows="5" ></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success mt-2" value="Add Data">
        <a href="/gamelist" class="btn btn-primary mt-2">Back</a>
    </div>

</div>