<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
    <div class="content p-4">
        <section id="list" class="p-2">
            <h4 class="fw-semibold mb-4">Dashboard <small class="fs-6">> Users</small></h4>
            <div>
                <div class="d-flex justify-content-between border-bottom">
                    <h5 class="align-self-center"><i class="fal fa-clipboard-list-check"></i>&nbsp;List Users</h5>
                    <p class="p-2 text-bg-success align-self-center" style="cursor: pointer" onclick="document.querySelector('#add').classList.replace('d-none','d-block')"><i class="fal fa-user-plus"></i>&nbsp;Add User</p>
                </div>
                <div class="text-bg-danger my-2 <?= $validation->getErrors() ? 'p-2' : '' ?>">
                    <?= $validation->listErrors(); ?>
                </div>
                <div id="tableListUser">
                    <table class="shadow text-center w-100" cellpadding="8">
                        <thead>
                        <tr class="text-bg-primary fs-6 text-uppercase">
                            <th class="">No</th>
                            <th class="">User ID</th>
                            <th class="">Name</th>
                            <th class="">Email</th>
                            <th class="">Join Date</th>
                            <th class="">Role</th>
                            <th class="">Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $total = count($user);
                            if ($total == 0):
                        ?>
                            <tr class="bg-white">
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                            </tr>
                        <?php
                            else:
                                for ($i=0; $i < $total; $i++):
                            ?>
                            <tr class="<?= ($i % 2 === 0) ? 'bg-white' : 'text-bg-warning' ?>">
                                <td class=""><?= $i+1; ?></td>
                                <td class=""><?= $user[$i]['userid']; ?></td>
                                <td class=""><?= $user[$i]['name']; ?></td>
                                <td class=""><?= $user[$i]['email']; ?></td>
                                <td class=""><?= $user[$i]['create_at'] ?></td>
                                <td class=""><?= $user[$i]['role']; ?></td>
                                <td class="">
                                    <button class="btn btn-outline-success px-3 py-1 rounded-0" onclick="editUser(<?= $user[$i]['userid']; ?>)">Edit</button>
                                    <button class="btn btn-outline-danger px-3 py-1 rounded-0" onclick="deleteUser(<?= $user[$i]['userid']; ?>)" <?= $user[$i]['role'] == 'admin' ? 'disabled' : '' ?>>Delete</button>
                                </td>
                            </tr>
                        <?php
                        endfor;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </section>
        <div id="add" class="d-none">
            <section class="vh-100 w-100" style="background: rgba(0,0,0,0.4); filter: blur(5px); top: 0; left: 0; position: fixed" onclick="document.querySelector('#add').classList.replace('d-block','d-none')"></section>
            <section class="bg-white shadow shadow-lg rounded" style="width: 350px; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 2em">
                <form method="post" action="/admin/register">
                    <div class="form-group">
                        <label for="InputName">Full Name</label>
                        <input type="text" name="name" class="form-control" id="InputName">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-2">
                        <label for="InputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="InputPassword1" autocomplete="on">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>

    </div>
<?= $this->endSection() ?>