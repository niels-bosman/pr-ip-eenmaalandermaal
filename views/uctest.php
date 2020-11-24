<main role="main" class="container">
    <div class="row">
        <div class="col">
            <?php

            use App\Controllers\AccountController;
            use App\Core\Database;

            $uc = new AccountController();
            $db = new Database();

            try {
                $testres = $db->test();
            } catch(Error $error) {
                $testresError = $error->getMessage();
            }

            try {
                $create = $uc->create(['email' => 'asd', 'password' => 'asd']);
            } catch (Error $error) {
                $createError = $error->getMessage();
            }

            try {
                $delete = $uc->delete(974);
            } catch (Error $error) {
                $deleteError = $error->getMessage();
            }

            try {
                $get = $uc->get(974);
            } catch (Error $error) {
                $getError = $error->getMessage();
            }

            try {
                $update = $uc->update(974, ['Lastname' => 'Rijnbende']);
            } catch (Error $error) {
                $updateError = $error->getMessage();
            }

            try {
                $users = $uc->index();
            } catch (Error $error) {
                $indexError = $error->getMessage();
            }

            ?>
            <h1>User Controller CRUD Operations Test</h1>
            <div class="row">
                <div class="col">
                    <h2>Create:</h2>
                    <div class="alert alert-danger <?= $createError ? 'd-block' : 'd-none'; ?>" role="alert">
                        <?= $createError ?? ''; ?>
                    </div>

                    <?php $create ? print_r($create) : "" ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2>Delete:</h2>
                    <div class="alert alert-danger <?= $deleteError ? 'd-block' : 'd-none'; ?>" role="alert">
                        <?= $deleteError ?? ''; ?>
                    </div>

                    <?php $delete ? print_r($delete) : "" ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2>Get:</h2>
                    <div class="alert alert-danger <?= $getError ? 'd-block' : 'd-none'; ?>" role="alert">
                        <?= $getError ?? ''; ?>
                    </div>

                    <?php $get ? print_r($get) : "" ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2>Update:</h2>
                    <div class="alert alert-danger <?= $testresError ? 'd-block' : 'd-none'; ?>" role="alert">
                        <?= $testresError ?? ''; ?>
                    </div>

                    <?php $testres ? print_r($testres) : "" ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2>Update:</h2>
                    <div class="alert alert-danger <?= $updateError ? 'd-block' : 'd-none'; ?>" role="alert">
                        <?= $updateError ?? ''; ?>
                    </div>

                    <?php $update ? print_r($update) : "" ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2>Index: </h2>

                    <div class="alert alert-danger <?= $indexError ? 'd-block' : 'd-none'; ?>" role="alert">
                        <?= $indexError ?? ''; ?>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <th scope="row"><?php echo $user['ID'] ?></th>
                                    <td><?php echo $user['Email'] ?></td>
                                    <td><?php echo $user['Password'] ?></td>
                                    <td><?php echo $user['Firstname'] . ' ' . $user['Lastname'] ?></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Action</button></td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>