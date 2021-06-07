<div class="container">
    <div class="row">
        <p class="fs-1 text-center mt-4">ระบบสุ่มตัวเลข</p>
        <div class="col-md-5"></div>
        <div class="col-md-2 mt-2">
            <form action="<?php echo site_url('Lottery/rand') ?>" method="POST">
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" type="submit">ดำเนินการสุ่มรางวัล</button>
                </div>
            </form>
        </div>
        <div class="col-md-5"></div>
    </div>
    <!-- form ตรวจผลรางวัล -->
    <div class="row mt-5 mb-3">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="<?php echo site_url('Lottery/search') ?>" method="POST">
                <p class="text-center">ตรวจสอบเลขรางวัล</p>
                <div class="input-group mt-2 mb-3 shadow">
                    <input type="tel" class="form-control" name="lottery" id="lottery" oninput="this.value=this.value.replace(/[^0-9]/g,'');" pattern=".{3,3}" maxlength="3" placeholder="โปรดป้อนหมายเลขของคุณ" required title="กรอกจำนวนเลข 3 หลัก">
                </div>
                <div class="text-center mt-2 mb-3">
                    <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg> ตรวจสอบ</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- ตารางแสดงผลรางวัล -->
    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <?php foreach ($lottery_types as $lottery_type) : ?>
                                        <th scope="col"><?php echo $lottery_type['type_name']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $j = '';
                                if ($countTypeId == NULL) {
                                    $j = 0;
                                } else {
                                    $j = 3;
                                }
                                for ($i = 0; $i < $j; $i++) {
                                ?>
                                    <tr>
                                        <?php
                                        foreach ($lottery_types as $loop => $datas) :
                                        ?>
                                            <td><?php if (isset($arr_lottery[$datas['type_id']][$i]) == NULL) {
                                                    echo '';
                                                } else {
                                                    echo $arr_lottery[$datas['type_id']][$i];
                                                }
                                                ?></td>
                                        <?php
                                        endforeach; ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($texts)) {
        if ($texts == 'ถูกรางวัลที่ 1') {
    ?>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-11"></div>
                                <div class="col-md-1 mb-3"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <p>ยินดีด้วยคุณถูกรางวัลที่ 1</p>
                                <img src="<?php echo site_url('../image/emoji.png') ?>" style="height: 40%;width: 40%;  display: block;margin-left: auto;margin-right: auto;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } elseif ($texts == 'ถูกรางวัลที่ 1 และเลขท้าย 2 ตัว') {
        ?>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-11"></div>
                                <div class="col-md-1 mb-3"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <p>ยินดีด้วยคุณถูกรางวัลที่ 1 และเลขท้าย 2 ตัว</p>
                                <img src="<?php echo site_url('../image/emoji.png') ?>" style="height: 40%;width: 40%;  display: block;margin-left: auto;margin-right: auto;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } elseif ($texts == 'ถูกรางวัลที่ 2') {
        ?>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-11"></div>
                                <div class="col-md-1 mb-3"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <p>ยินดีด้วยคุณถูกรางวัลที่ 2</p>
                                <img src="<?php echo site_url('../image/emoji.png') ?>" style="height: 40%;width: 40%;  display: block;margin-left: auto;margin-right: auto;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } elseif ($texts == 'ถูกรางวัลที่ 2 และเลขท้าย 2 ตัว') {
        ?>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-11"></div>
                                <div class="col-md-1 mb-3"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <p>ยินดีด้วยคุณถูกรางวัลที่ 2 และเลขท้าย 2 ตัว</p>
                                <img src="<?php echo site_url('../image/emoji.png') ?>" style="height: 40%;width: 40%;  display: block;margin-left: auto;margin-right: auto;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } elseif ($texts == 'รางวัลเลขข้างเคียงรางวัลที่ 1') {
        ?>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-11"></div>
                                <div class="col-md-1 mb-3"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <p>ยินดีด้วยคุณถูกรางวัลเลขข้างเคียงรางวัลที่ 1</p>
                                <img src="<?php echo site_url('../image/emoji.png') ?>" style="height: 40%;width: 40%;  display: block;margin-left: auto;margin-right: auto;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } elseif ($texts == 'รางวัลเลขข้างเคียงรางวัลที่ 1 และเลขท้าย 2 ตัว') {
        ?>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-11"></div>
                                <div class="col-md-1 mb-3"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <p>ยินดีด้วยคุณถูกรางวัลเลขข้างเคียงรางวัลที่ 1 และเลขท้าย 2 ตัว</p>
                                <img src="<?php echo site_url('../image/emoji.png') ?>" style="height: 40%;width: 40%;  display: block;margin-left: auto;margin-right: auto;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } elseif ($texts == 'รางวัลเลขท้าย 2 ตัว') {
        ?>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-11"></div>
                                <div class="col-md-1 mb-3"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <p>ยินดีด้วยคุณถูกรางวัลเลขท้าย 2 ตัว</p>
                                <img src="<?php echo site_url('../image/emoji.png') ?>" style="height: 40%;width: 40%;  display: block;margin-left: auto;margin-right: auto;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-11"></div>
                                <div class="col-md-1 mb-3"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <p>เสียใจด้วยคุณไม่ถูกรางวัล</p>
                                <img src="<?php echo site_url('../image/cry.png') ?>" style="height: 40%;width: 40%;  display: block;margin-left: auto;margin-right: auto;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').modal('show')
    });
</script>