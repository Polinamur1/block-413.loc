<?
require_once VIEWS.'\components\header.php';
?>

<main class="container py-3">
        <div class="row">
            <div class="col-12">
                <h3><?= $header ?? "" ?></h3>
                <form action="posts" method="POST">
                    <!-- заголовок -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Post title</label>
                        <input type="email" class="form-control" id="title" name="title" placeholder="Post title" value="<?=old('title') ?>">
                        <?= isset($validator) ? $validator->listErrors('title') : "" ?>
                    </div>

                    <!-- описание -->

                    <div class="mb-3">
                        <label for="descr" class="form-label">Description</label>
                        <input type="text" class="form-control" id="descr" name="descr" placeholder="Post description" value="<?=old('descr') ?>">
                        <?= isset($validator) ? $validator->listErrors('descr') : "" ?>

                    </div>


                    <!-- контент -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea type="text" class="form-control" id="content" name="content" rows="15" placeholder="Post title" value="<?=old('content') ?>"></textarea>
                        <?= isset($validator) ? $validator->listErrors('content') : "" ?>

                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
                </div>
                </div>
            </main>

<?
require_once VIEWS.'\components\footer.php';
?>