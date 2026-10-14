<?php include 'template/header.php' ?>
<style>
    .form-control[readonly] {
        background-color: #2F211D;
        border-color: #707070;
        -moz-appearance: none;
        -webkit-appearance: none;
        color: #fff;
    }

    .lamp-success {
        width: 10px;
        height: 10px;
        margin: auto 8px auto 0;
        border-radius: 50%;
        background-color: #43e20d !important;
        box-shadow: inset 2px 2px 8px rgba(255, 255, 255, 0.4), 0px 0px 4px #4CAF50, 0px 0px 8px #4CAF50, 0px 0px 12px #4CAF50, 0px 0px 20px #4CAF50;
    }

    .lamp-fail {
        width: 10px;
        height: 10px;
        margin: auto 8px auto 0;
        border-radius: 50%;
        background-color: red !important;
        box-shadow: inset 2px 2px 8px rgba(255, 255, 255, 0.4), 0px 0px 4px #F44336, 0px 0px 8px #F44336, 0px 0px 12px #F44336, 0px 0px 20px #F44336;
    }

    .select_box:after {
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid #fff;
        position: absolute;
        top: 15px;
        right: 45px;
        content: "";
    }

    .select_box2:after {
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid #fff;
        position: absolute;
        top: 15px;
        right: 15px;
        content: "";
    }

    .tab-active {
        cursor: pointer;
        background-image: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #e99c05 0%, #f4ae00 8%, #f8bf33 25%, #f8ce19 62.5%, #ffdc02 100%);
        color: #fff;
        border-radius: 4px;
        padding: 6px 12px;
        margin-right: 6px;
    }

    .tab-nonactive {
        cursor: pointer;
        box-shadow: 0 0 0 1px #fff inset;
        border-radius: 4px;
        padding: 6px 18px;
        margin-right: 6px;
    }
    
    .qris-image-preview {
        margin-top: 12px;
        padding: 12px;
        background: #fff;
        border-radius: 8px;
        text-align: center;
        display: none;
    }
    
    .qris-image-preview img {
        max-width: 200px;
        border-radius: 5px;
    }
    
    .qris-info {
        margin-top: 8px;
        padding: 8px;
        background: var(--secondary-color);
        border-radius: 6px;
        font-size: 12px;
    }
</style>

<?php if ($mobile): ?>
    <div style="margin-top: 50px;">
        <div style="
    padding:20px 0 120px 0;
    background:#000;
    min-height:100vh;
">
            <div
                style="width: 90%; margin: 0 auto 10px auto; color: transparent !important; -webkit-background-clip: text; background-image: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #e99c05 0%, #f4ae00 8%, #f8bf33 25%, #f8ce19 62.5%, #ffdc02 100%); font-family: Teko-SemiBold; text-align: center; font-size: 25px;">
                METODE PEMBAYARAN
            </div>

            <div style="width: 90%; margin: 0 auto 20px auto; display: flex;" id="deposit-tabs">
                <div class="tab tab-active" data-tab="auto" style="
    width:130px;
    height:70px;
    background:linear-gradient(180deg,#ff001e,#c40018);
    border-radius:25px;
    margin:auto;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
    font-size:20px;
    font-weight:bold;
    color:#fff;
    box-shadow:0 0 20px rgba(255,0,0,0.5);
">
                    <i class="fas fa-exchange-alt" style="font-size:24px;margin-bottom:8px;"></i> AUTO
                </div>
            </div>

            <!-- tab QRIS -->
            <form method="post" action="javascript:void(0);" id="form-auto-mobile"
                class="from-prevent-multiple-submits deposit-form" enctype="multipart/form-data"
                style="width: 90%; margin: 0 auto 20px auto; display: block;" data-tab="auto">
                <input type="hidden" name="_token" value="" autocomplete="off">


                <div id="form-container-mobile" style="display:block;">

    <div style="
        background:#000;
        border:3px solid #fff;
        border-radius:35px;
        padding:25px;
        margin-top:20px;
        box-shadow:0 0 20px rgba(255,0,0,0.4);
    ">

        <div style="
            text-align:center;
            color:#fff;
            font-size:26px;
            font-weight:bold;
            margin-bottom:30px;
            font-family:Poppins,sans-serif;
        ">
            Otomatis Bank/Ewallet
        </div>

        <!-- USERNAME -->
        <div style="
            color:#fff;
            margin-bottom:10px;
            font-size:16px;
        ">
            Username / UserID Member
        </div>

        <input 
    type="text" 
    class="form-control"
    value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"
    readonly
    style="
        height:60px;
        border-radius:20px;
        background:#11152c;
        border:none;
        color:#fff;
        margin-bottom:25px;
        font-size:18px;
        text-align:center;
        font-weight:bold;
    "
>

        <!-- JUMLAH -->
        <div style="
            color:#fff;
            margin-bottom:10px;
            font-size:16px;
        ">
            Nominal Deposit
        </div>

        <input 
            type="tel" 
            name="amount"
            class="form-control rupiah"
            placeholder="Minimal 10.000"
            style="
                height:60px;
                border-radius:20px;
                background:#11152c;
                border:none;
                color:#fff;
                margin-bottom:30px;
                font-size:18px;
            "
        >

        <!-- HIDDEN QRIS -->
        <input type="hidden" name="type_master_bank_accounts" value="qris">

        <input type="hidden" name="master_bank_accounts" value="QRIS">

        <!-- PROMO -->
        <input type="hidden" name="promo_id" value="">

        <!-- BUTTON -->
        <button type="submit" style="
            width:100%;
            height:65px;
            border:none;
            border-radius:22px;
            background:linear-gradient(180deg,#ff001e,#c40018);
            color:#fff;
            font-size:24px;
            font-weight:bold;
            box-shadow:0 0 20px rgba(255,0,0,0.5);
        ">
            DEPO QR
        </button>

    </div>

</div>

                <!-- QR Code Display Container (hidden by default or shown if has pending deposit) -->
                <div id="qr-container-mobile" style="display: none; text-align: center;">
                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #FDB931; margin-bottom: 12px; font-size: 18px;">Scan QR Code untuk Membayar</h4>
                        <div id="qr-code-display-mobile"
                            style="background: #fff; padding: 15px; border-radius: 10px; display: inline-block;">
                            <!-- QR Code will be inserted here -->
                        </div>

                        <!-- Download QR Button -->
                        <div style="margin-top: 12px;">
                            <button type="button" id="download-qr-btn-mobile" class="btn btn-success"
                                style="background: #28a745; color: #fff; border: 0; font-weight: bold; border-radius: 25px; padding: 10px 30px; width: 100%;">
                                <i class="fas fa-download"></i> Download QR Code
                            </button>
                        </div>
                    </div>

                    <div
                        style="margin-bottom: 12px; padding: 12px; background: var(--secondary-color); border-radius: 8px; font-size: 13px;">
                        <div style="margin-bottom: 6px;">
                            <strong>Nomor Referensi:</strong><br>
                            <span id="ref-number-mobile">-</span>
                        </div>
                        <div style="margin-bottom: 6px;">
                            <strong>Jumlah:</strong><br>
                            Rp <span id="qr-amount-mobile">-</span>
                        </div>
                        <div style="margin-bottom: 6px;">
                            <strong>Berlaku hingga:</strong><br>
                            <span id="qr-expired-mobile">-</span>
                        </div>
                        <div>
                            <strong>Status:</strong><br>
                            <span
                                style="background-color: #17a2b8; color: #fff; padding: 4px 10px; border-radius: 4px; font-size: 11px;">
                                PROCESSING
                            </span>
                        </div>
                    </div>



                    <div
                        style="padding: 10px; background: #28a745; border-radius: 6px; color: #fff; font-size: 12px; margin-bottom: 10px;">
                        <i class="fas fa-info-circle"></i> Pembayaran akan otomatis diproses setelah Anda melakukan
                        pembayaran
                    </div>

                    <div style="padding: 10px; background: #ffc107; border-radius: 6px; color: #000; font-size: 12px;">
                        <i class="fas fa-sync fa-spin"></i> Halaman akan refresh otomatis untuk mengecek status pembayaran
                    </div>
                </div>
            </form>

            <!-- TAB BANK TRANSFER (DIUBAH MENJADI SEPERTI E-WALLET) -->
            <form method="post" action="../function/proses_deposit.php" id="form-bank-mobile"
                class="from-prevent-multiple-submits deposit-form" enctype="multipart/form-data"
                style="width: 90%; margin: 0 auto 20px auto; display: none;" data-tab="bank">
                <input type="hidden" name="_token" value="" autocomplete="off">
                
                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Rekening Asal
                </div>
                <div style="margin-bottom: 12px;">
                    <?php
                    $userbank = $bank_user . ' - ' . $no_rek_user . ' - ' . $nama_rek_user ?>
                    <input type="text" name="user_bank_info" class="form-control" value="<?= $userbank ?>" readonly>
                </div>

                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Bank Tujuan
                </div>
                <div class="select_box" style="margin-bottom: 12px; position: relative;">
                    <select name="master_bank_accounts_id" class="master_bank_accounts_id form-control" id="master_bank_select_bank">
                        <option value="">Pilih Bank Tujuan</option>
                        <?php
                        // Ambil data bank dengan jenis BANK (bukan QRIS/E-wallet)
                        $bank = mysqli_query($koneksi, "SELECT * FROM bank WHERE status_bank = 'aktif' AND (jenis_bank = 'BANK' OR jenis_bank NOT IN ('QRIS', 'DANA', 'OVO', 'GOPAY', 'SHOPEEPAY', 'LINKAJA')) ORDER BY jenis_bank ASC");
                        while ($data = mysqli_fetch_assoc($bank)): 
                            $jenis_bank = strtoupper($data['jenis_bank']);
                            ?>
                            <option value="<?= $data['id_bank']; ?>"
                                data-account-number="<?= htmlspecialchars($data['nomor_rekening_bank']); ?>"
                                data-account-name="<?= htmlspecialchars($data['atas_nama_bank']); ?>"
                                data-bank-name="<?= htmlspecialchars($data['jenis_bank']); ?>"
                                data-gambar="<?= htmlspecialchars($data['gambar_bank']); ?>"
                                data-jenis="<?= htmlspecialchars($data['jenis_bank']); ?>"
                                data-commission-type="<?= $data['komisi_type']; ?>"
                                data-commission="<?= $data['komisi']; ?>">
                                <?= $jenis_bank; ?> - <?= $data['nomor_rekening_bank']; ?> (<?= $data['atas_nama_bank']; ?>)
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <i class="fa fa-copy" onclick="setClipboardBank()"
                        style="position: absolute; top: 0; right: 0; border-left: 1px solid #707070; padding: 10px; cursor: pointer;"></i>

                    <div class="commission-bank" style="color: #FFD700; margin: 10px 0; font-size: 13px;">
                        Biaya Admin: <span class="admin-fee-text-bank">0.00%</span>
                    </div>
                </div>

                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Pilih Promo
                </div>
                <div class="select_box2" style="margin-bottom: 12px; position: relative;">
                    <select name="promo_id" class="promo_id form-control" style="padding-right: 35px;"
                        onchange="updatePromoInfoBankMobile(this)">
                        <option value="">Tidak Menggunakan Promo</option>
                        <?php
                        $get_bonus = mysqli_query($koneksi, "
                                    SELECT id_bonus, judul, persentase, nominal, turnover, 
                                        min_depo, min_wd, max_wd 
                                    FROM bonus 
                                    WHERE status = 1
                                    ORDER BY judul ASC
                                ");

                        while ($bonus = mysqli_fetch_assoc($get_bonus)):

                            $id_bonus = (int) $bonus['id_bonus'];
                            $judul = htmlspecialchars($bonus['judul']);
                            $persen = (int) $bonus['persentase'];
                            $nominal = (int) $bonus['nominal'];
                            $turnover = (int) $bonus['turnover'];
                            $min_depo = (int) $bonus['min_depo'];
                            $min_wd = (int) $bonus['min_wd'];
                            $max_wd = (int) $bonus['max_wd'];

                            ?>
                            <option value="<?= $id_bonus; ?>" data-bonus-percentage="<?= $persen; ?>"
                                data-bonus-nominal="<?= $nominal; ?>" data-turnover="<?= $turnover; ?>"
                                data-min-deposit="<?= $min_depo; ?>" data-min-wd="<?= $min_wd; ?>"
                                data-max-bonus="<?= $max_wd; ?>">
                                <?= $judul; ?>
                                <?php if ($persen > 0): ?>
                                    (
                                    <?= $persen; ?>%
                                <?php elseif ($nominal > 0): ?>
                                    (Rp
                                    <?= number_format($nominal); ?>
                                <?php endif; ?>
                                - TO x
                                <?= $turnover; ?>)
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <div class="promo-info-bank-mobile" style="color: #FFD700; margin-top: 8px; font-size: 12px; display: none;">
                        <div class="promo-bonus-bank-mobile">Bonus: <span class="promo-bonus-text-bank-mobile">0%</span></div>
                        <div class="promo-min-deposit-bank-mobile">Minimal Deposit: <span class="promo-min-deposit-text-bank-mobile">Rp. 0</span></div>
                        <div class="promo-max-bonus-bank-mobile">Maksimal Bonus: <span class="promo-max-bonus-text-bank-mobile">Rp. 0</span></div>
                    </div>
                </div>

                <script>
                    function updatePromoInfoBankMobile(select) {
                        const selectedOption = select.options[select.selectedIndex];
                        const promoInfo = document.querySelector('.promo-info-bank-mobile');

                        if (selectedOption.value) {
                            const bonusPercentage = selectedOption.getAttribute('data-bonus-percentage');
                            const maxBonus = selectedOption.getAttribute('data-max-bonus');
                            const minDeposit = selectedOption.getAttribute('data-min-deposit');

                            document.querySelector('.promo-bonus-text-bank-mobile').textContent = bonusPercentage + '%';
                            document.querySelector('.promo-min-deposit-text-bank-mobile').textContent = 'Rp. ' + parseFloat(
                                minDeposit).toLocaleString('id-ID');
                            document.querySelector('.promo-max-bonus-text-bank-mobile').textContent = 'Rp. ' + parseFloat(
                                maxBonus).toLocaleString('id-ID');

                            promoInfo.style.display = 'block';
                        } else {
                            promoInfo.style.display = 'none';
                        }
                    }
                </script>

                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Jumlah
                </div>
                <div style="margin-bottom: 12px;">
                    <input type="tel" name="amount" class="form-control rupiah" placeholder="Minimal 10,000" value="">
                </div>

                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Bukti Transfer <span style="color: #888; font-size: 11px;">(Opsional)</span>
                </div>
                <div style="margin-bottom: 16px;">
                    <input type="file" id="receipt-file-bank-mobile" class="form-control" accept="image/*"
                        onchange="convertToBase64BankMobile(this)">
                    <input type="hidden" name="receipt_base64" id="receipt-base64-bank-mobile">
                    <div id="receipt-preview-bank-mobile" style="margin-top: 8px; display: none;">
                        <img id="receipt-preview-img-bank-mobile" src=""
                            style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; border-radius: 4px;">
                        <button type="button" onclick="removeReceiptBankMobile()"
                            style="display: block; margin-top: 5px; background: #dc3545; color: #fff; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 12px;">
                            Hapus Gambar
                        </button>
                    </div>
                </div>

                <script>
                    function convertToBase64BankMobile(input) {
                        if (input.files && input.files[0]) {
                            const file = input.files[0];

                            if (file.size > 2 * 1024 * 1024) {
                                alert('Ukuran file maksimal 2MB');
                                input.value = '';
                                return;
                            }

                            if (!file.type.match('image.*')) {
                                alert('File harus berupa gambar');
                                input.value = '';
                                return;
                            }

                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('receipt-base64-bank-mobile').value = e.target.result;
                                document.getElementById('receipt-preview-img-bank-mobile').src = e.target.result;
                                document.getElementById('receipt-preview-bank-mobile').style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    }

                    function removeReceiptBankMobile() {
                        document.getElementById('receipt-file-bank-mobile').value = '';
                        document.getElementById('receipt-base64-bank-mobile').value = '';
                        document.getElementById('receipt-preview-bank-mobile').style.display = 'none';
                        document.getElementById('receipt-preview-img-bank-mobile').src = '';
                    }
                </script>

                <div style="margin-top: 20px;">
                    <input type="hidden" name="admin_fee_type" class="form-control admin_fee_type_bank" value="percentage">
                    <input type="hidden" name="admin_fee" class="form-control admin_fee_bank" value="0.00">
                    <button type="submit"
                        style="background-image: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #e99c05 0%, #f4ae00 8%, #f8bf33 25%, #f8ce19 62.5%, #ffdc02 100%); color: #fff; border: 0; width: 100%; font-weight: bold; border-radius: 25px; padding: 10px 0;">
                        Deposit Bank
                    </button>
                </div>
            </form>

            <!-- tab deposit e-wallet (manual) -->
            <form method="post" action="../function/proses_deposit.php" id="form-manual"
                class="from-prevent-multiple-submits deposit-form" enctype="multipart/form-data"
                style="width: 90%; margin: 0 auto 20px auto; display: none;" data-tab="manual">
                <input type="hidden" name="_token" value="" autocomplete="off">
                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Rekening Asal
                </div>
                <div style="margin-bottom: 12px;">
                    <?php
                    $userbank = $bank_user . ' - ' . $no_rek_user . ' - ' . $nama_rek_user ?>
                    <input type="text" name="user_bank_info" class="form-control" value="<?= $userbank ?>" readonly>
                </div>

                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Rekening Tujuan (QRIS/E-Wallet)
                </div>
                <div class="select_box" style="margin-bottom: 12px; position: relative;">
                    <select name="master_bank_accounts_id" class="master_bank_accounts_id form-control" id="master_bank_select">
                        <option value="">Pilih QRIS/E-Wallet Tujuan</option>
                        <?php
                        // Hanya ambil data bank dengan jenis QRIS atau E-Wallet
                        $bank = mysqli_query($koneksi, "SELECT * FROM bank WHERE status_bank = 'aktif' AND (jenis_bank = 'QRIS' OR jenis_bank IN ('DANA', 'OVO', 'GOPAY', 'SHOPEEPAY', 'LINKAJA')) ORDER BY jenis_bank ASC");
                        while ($data = mysqli_fetch_assoc($bank)): 
                            $jenis_bank = strtoupper($data['jenis_bank']);
                            ?>
                            <option value="<?= $data['id_bank']; ?>"
                                data-account-number="<?= htmlspecialchars($data['nomor_rekening_bank']); ?>"
                                data-account-name="<?= htmlspecialchars($data['atas_nama_bank']); ?>"
                                data-bank-name="<?= htmlspecialchars($data['jenis_bank']); ?>"
                                data-gambar="<?= htmlspecialchars($data['gambar_bank']); ?>"
                                data-jenis="<?= htmlspecialchars($data['jenis_bank']); ?>">
                                <?= $jenis_bank; ?> - <?= $data['nomor_rekening_bank']; ?> (<?= $data['atas_nama_bank']; ?>)
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <i class="fa fa-copy" onclick="setClipboard()"
                        style="position: absolute; top: 0; right: 0; border-left: 1px solid #707070; padding: 10px; cursor: pointer;"></i>

                    <div class="commission" style="color: #FFD700; margin: 10px 0; font-size: 13px;">
                        Biaya Admin: <span class="admin-fee-text">0.00%</span>
                    </div>

                    <!-- QRIS Image Preview - Only for QRIS type -->
                    <div class="qris-image-preview" id="qris-preview-container" style="display: none;">
                        <div style="background: #fff; padding: 10px; border-radius: 8px; text-align: center;">
                            <img id="qris-preview-img" src="" alt="QRIS Image" style="max-width: 200px; border-radius: 5px;">
                            <div style="margin-top: 8px; font-size: 12px; color: #FFD700;">
                                <i class="fas fa-qrcode"></i> Scan QR Code untuk pembayaran
                            </div>
                        </div>
                    </div>
                </div>

                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Pilih Promo
                </div>
                <div class="select_box2" style="margin-bottom: 12px; position: relative;">
                    <select name="promo_id" class="promo_id form-control" style="padding-right: 35px;"
                        onchange="updatePromoInfoMobile(this)">
                        <option value="">Tidak Menggunakan Promo</option>
                        <?php
                        $get_bonus = mysqli_query($koneksi, "
                                    SELECT id_bonus, judul, persentase, nominal, turnover, 
                                        min_depo, min_wd, max_wd 
                                    FROM bonus 
                                    WHERE status = 1
                                    ORDER BY judul ASC
                                ");

                        while ($bonus = mysqli_fetch_assoc($get_bonus)):

                            $id_bonus = (int) $bonus['id_bonus'];
                            $judul = htmlspecialchars($bonus['judul']);
                            $persen = (int) $bonus['persentase'];
                            $nominal = (int) $bonus['nominal'];
                            $turnover = (int) $bonus['turnover'];
                            $min_depo = (int) $bonus['min_depo'];
                            $min_wd = (int) $bonus['min_wd'];
                            $max_wd = (int) $bonus['max_wd'];

                            ?>
                            <option value="<?= $id_bonus; ?>" data-bonus-percentage="<?= $persen; ?>"
                                data-bonus-nominal="<?= $nominal; ?>" data-turnover="<?= $turnover; ?>"
                                data-min-deposit="<?= $min_depo; ?>" data-min-wd="<?= $min_wd; ?>"
                                data-max-bonus="<?= $max_wd; ?>">
                                <?= $judul; ?>
                                <?php if ($persen > 0): ?>
                                    (
                                    <?= $persen; ?>%
                                <?php elseif ($nominal > 0): ?>
                                    (Rp
                                    <?= number_format($nominal); ?>
                                <?php endif; ?>
                                - TO x
                                <?= $turnover; ?>)
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <div class="promo-info" style="color: #FFD700; margin-top: 8px; font-size: 12px; display: none;">
                        <div class="promo-bonus">Bonus: <span class="promo-bonus-text">0%</span></div>
                        <div class="promo-min-deposit">Minimal Deposit: <span class="promo-min-deposit-text">Rp. 0</span>
                        </div>
                        <div class="promo-max-bonus">Maksimal Bonus: <span class="promo-max-bonus-text">Rp. 0</span></div>
                    </div>
                </div>

                <script>
                    function updatePromoInfoMobile(select) {
                        const selectedOption = select.options[select.selectedIndex];
                        const promoInfo = document.querySelector('#form-manual .promo-info');

                        if (selectedOption.value) {
                            const bonusPercentage = selectedOption.getAttribute('data-bonus-percentage');
                            const maxBonus = selectedOption.getAttribute('data-max-bonus');
                            const minDeposit = selectedOption.getAttribute('data-min-deposit');

                            document.querySelector('#form-manual .promo-bonus-text').textContent = bonusPercentage + '%';
                            document.querySelector('#form-manual .promo-min-deposit-text').textContent = 'Rp. ' + parseFloat(
                                minDeposit).toLocaleString('id-ID');
                            document.querySelector('#form-manual .promo-max-bonus-text').textContent = 'Rp. ' + parseFloat(
                                maxBonus).toLocaleString('id-ID');

                            promoInfo.style.display = 'block';
                        } else {
                            promoInfo.style.display = 'none';
                        }
                    }
                </script>

                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Jumlah
                </div>
                <div style="margin-bottom: 12px;">
                    <input type="tel" name="amount" class="form-control rupiah" placeholder="Jumlah" value="">
                </div>

                <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                    Bukti Transfer <span style="color: #888; font-size: 11px;">(Opsional)</span>
                </div>
                <div style="margin-bottom: 16px;">
                    <input type="file" id="receipt-file-mobile" class="form-control" accept="image/*"
                        onchange="convertToBase64Mobile(this)">
                    <input type="hidden" name="receipt_base64" id="receipt-base64-mobile">
                    <div id="receipt-preview-mobile" style="margin-top: 8px; display: none;">
                        <img id="receipt-preview-img-mobile" src=""
                            style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; border-radius: 4px;">
                        <button type="button" onclick="removeReceiptMobile()"
                            style="display: block; margin-top: 5px; background: #dc3545; color: #fff; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 12px;">
                            Hapus Gambar
                        </button>
                    </div>
                </div>

                <script>
                    function convertToBase64Mobile(input) {
                        if (input.files && input.files[0]) {
                            const file = input.files[0];

                            if (file.size > 2 * 1024 * 1024) {
                                alert('Ukuran file maksimal 2MB');
                                input.value = '';
                                return;
                            }

                            if (!file.type.match('image.*')) {
                                alert('File harus berupa gambar');
                                input.value = '';
                                return;
                            }

                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('receipt-base64-mobile').value = e.target.result;
                                document.getElementById('receipt-preview-img-mobile').src = e.target.result;
                                document.getElementById('receipt-preview-mobile').style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    }

                    function removeReceiptMobile() {
                        document.getElementById('receipt-file-mobile').value = '';
                        document.getElementById('receipt-base64-mobile').value = '';
                        document.getElementById('receipt-preview-mobile').style.display = 'none';
                        document.getElementById('receipt-preview-img-mobile').src = '';
                    }
                </script>

                <div style="margin-top: 20px;">
                    <input type="hidden" name="admin_fee_type" class="form-control admin_fee_type" value="percentage">
                    <input type="hidden" name="admin_fee" class="form-control admin_fee" value="0.00">
                    <button type="submit"
                        style="background-image: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #e99c05 0%, #f4ae00 8%, #f8bf33 25%, #f8ce19 62.5%, #ffdc02 100%); color: #fff; border: 0; width: 100%; font-weight: bold; border-radius: 25px; padding: 10px 0;">
                        Deposit
                    </button>
                </div>
            </form>

            <div style="width: 90%; margin: 30px auto 10px auto;">
                7 Transaksi Deposit Terakhir
            </div>

            <div style="width: 90%; margin: 0 auto; display: block; overflow: auto;">
                <table width="100%" style="font-size: 11px;" id="tabelDeposit">
                    <thead>
                        <tr style="background-color: #494848; color: #fff; font-weight: bold;">
                            <td style="padding: 12px 5px;">Status</td>
                            <td style="padding: 12px 5px;">Tanggal</td>
                            <td style="padding: 12px 5px;">Dari Rek</td>
                            <td style="padding: 12px 5px;">Ke Rek</td>
                            <td style="padding: 12px 5px;">Jumlah</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog" style="color: #000;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">QR Tujuan <span class="modal-bank-name"></span></h4>
                    </div>
                    <div class="modal-body">
                        <div style="text-align: center; font-weight: bold; font-size: 15px; margin-bottom: 8px;"
                            class="modal-account-info">
                        </div>
                        <div class="modal-qr-image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div style="margin-top: 170px;">
        <div class="background-top" style="padding: 30px 0 50px 0;">
            <div style="width: 95%; margin: 0 auto; max-width: 1280px;">
                <div
                    style="margin-bottom: 20px; color: #FDC23A; font-family: Teko-SemiBold; font-size: 24px; text-align: center;">
                    FORM DEPOSIT
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <div
                        style="flex-basis: calc(25% - 10px); font-size: 16px; box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15); height: 100%;">
                        <div
                            style="background-color: var(--secondary-color); color: #FDC23A; padding: 12px 24px; font-size: 18px;">
                            Akun Saya
                        </div>
                        <div style="background-color: var(--primary-color); padding: 4px 24px;">
                            <div onclick="window.location='https://rajabotak102.xyz/user/deposit'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/deposit.png?s=e42856962496f5e9c4d421449295effe"
                                    alt="deposit" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0; color: #FDC23A;">Deposit</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="color: #FDC23A; margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='withdraw'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/withdraw.png?s=8bdf770e191a4f7d4360e531d183e3a4"
                                    alt="withdraw" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Withdraw</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='/history'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/history.png?s=18ea8300a3ee8d25a8ff8d4e0a874578"
                                    alt="Riwayat Transaksi" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Riwayat Transaksi</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='history'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/game-2-color.png?s=234bab898d64b8f3aa8d78c4948af853"
                                    alt="Riwayat Slot" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Riwayat Slot</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='history'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/game-3-color.png?s=3e21633aca1f3525e076aa3eeb7922f1"
                                    alt="Riwayat Live Casino" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Riwayat Live Casino</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='history'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/game-4-color.png?s=1ccfaf5ad1dd313f72fc808d04e12adc"
                                    alt="Riwayat Tembak Ikan" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Riwayat Tembak Ikan</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='history'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/game-5-color.png?s=9f0712768c4df588e8f4a7561dd83d83"
                                    alt="Riwayat Sports" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Riwayat Sport</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='history'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/game-6-color.png?s=c9443f6652b3933f30daf41cf26419c2"
                                    alt="Riwayat Virtual" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Riwayat Virtual</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='history'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/game-8-color.png?s=e832bd2e6acf9d37881551366f115596"
                                    alt="Riwayat Sabung Ayam" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Riwayat Sabung Ayam</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='history'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/game-7-color.png?s=c17f9d8c31e1b9438ebe971209a645a5"
                                    alt="Riwayat Togel" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Riwayat Togel</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='history'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/invoice.png?s=2a5b52fa64e85d789a91972def75ce7a"
                                    alt="Invoice" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Invoice</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div
                            style="background-color: var(--secondary-color); color: #FDC23A; padding: 12px 24px; font-size: 18px;">
                            Data Personal
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='profile'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/username.png?s=71f0a449310b58e9aa30e8f9829fc5aa"
                                    alt="Akun Saya" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Akun Saya</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='pesan'" style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/memo.png?s=2c507b59278767880daa57e8a753673b"
                                    alt="Pesan" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Pesan</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='referral'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/referral.png?s=0ca43d3919316e1e2d5b15f910c6bd18"
                                    alt="Referral" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Referral</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div
                            style="background-color: var(--secondary-color); color: #FDC23A; padding: 12px 24px; font-size: 18px;">
                            Pengecekan
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='turn-over'"
                                style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/checking.png?s=435a94292a9e5a1e7c2f32162521e0b3"
                                    alt="Turn Over" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Turn Over</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                        <div style="background-color: var(--primary-color); padding: 0 24px;">
                            <div onclick="window.location='promo'" style="cursor: pointer; display: flex; padding: 12px 0;">
                                <img src="https://rajabotak.dataklmsad902.site/asset/images/checking2.png?s=46964903bb12498cbfa2ad4ddf33ba1d"
                                    alt="Promo Deposit" style="width: 24px; margin-right: 8px;">
                                <div style="margin: auto 0;">Promo Deposit</div>
                                <i class="glyphicon glyphicon-chevron-right arrow-opt"
                                    style="margin: auto 0 auto auto;"></i>
                            </div>
                        </div>
                    </div>

                    <div style="flex-basis: calc(75% - 10px); box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15); height: 100%;">
                        <div
                            style="background-color: var(--secondary-color); color: #FDC23A; padding: 12px 24px; font-size: 18px;">
                            Deposit
                        </div>
                        <div style="background-color: var(--primary-color); padding: 12px 24px;">
                            <div
                                style="margin-bottom: 10px; padding: 10px; background-color: var(--secondary-color); border-radius: 6px; display: flex; font-size: 16px;">
                                <div style="border-radius: 25px; margin: auto 0;">
                                    <i class="fas fa-exclamation-circle" style="color: #C4C4C4; font-size: 24px;"></i>
                                </div>
                                <div style="margin-left: 8px;">
                    * Deposit Minimum Rp.10.000<br>
                    * Deposit Lebih Mudah dengan QRIS<br>
                    * Tidak perlu isi rekening tujuan atau upload bukti transfer.<br>
                    * Scan QRIS → Bayar → Selesai.<br>
                    * Saldo langsung masuk ke akun Anda.
                </div>
            </div>
            <div class="copy-success"></div>

            <div style="width: 90%; margin: 0 auto 20px auto;">
            </div>
            <div style="width: 90%; margin: 0 auto 20px auto; display: flex;" id="deposit-tabs">
                <div class="tab tab-active" data-tab="auto">
                    <i class="fas fa-exchange-alt"></i> AUTO
                </div>
            </div>

            <!-- tab QRIS -->
            <form method="post" action="javascript:void(0);" id="form-auto-mobile"
                class="from-prevent-multiple-submits deposit-form" enctype="multipart/form-data"
                style="width: 90%; margin: 0 auto 20px auto; display: block;" data-tab="auto">
                <input type="hidden" name="_token" value="" autocomplete="off">


                <div id="form-container-mobile" style="display: block;">
                    <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                        Tipe Tujuan
            </div>
            <div class="select_box" style="margin-bottom: 12px; position: relative;">
                <select name="type_master_bank_accounts" class="type_master_bank_accounts form-control">
                                            <option value="qris" data-expired="+5 minutes">Otomatis Bank/Ewallet
                        </option>
                                    </select>
                            </div>

            <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                Tujuan
            </div>
            <div class="select_box" style="margin-bottom: 12px; position: relative;">
                <select name="master_bank_accounts" class="master_bank_accounts form-control">
                    <option value="">QRIS</option>
                </select>
                            </div>

            <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                Pilih Promo
                    </div>
                    <div class="select_box2" style="margin-bottom: 12px; position: relative;">
                        <select name="promo_id" class="promo_id form-control" style="padding-right: 35px;"
                            onchange="updatePromoInfoAutoMobile(this)">
                            <option value="">Tidak Menggunakan Promo</option>
                            <?php
                            $get_bonus = mysqli_query($koneksi, "
                                    SELECT id_bonus, judul, persentase, nominal, turnover, 
                                        min_depo, min_wd, max_wd 
                                    FROM bonus 
                                    WHERE status = 1
                                    ORDER BY judul ASC
                                ");

                            while ($bonus = mysqli_fetch_assoc($get_bonus)):

                                $id_bonus = (int) $bonus['id_bonus'];
                                $judul = htmlspecialchars($bonus['judul']);
                                $persen = (int) $bonus['persentase'];
                                $nominal = (int) $bonus['nominal'];
                                $turnover = (int) $bonus['turnover'];
                                $min_depo = (int) $bonus['min_depo'];
                                $min_wd = (int) $bonus['min_wd'];
                                $max_wd = (int) $bonus['max_wd'];

                                ?>
                                <option value="<?= $id_bonus; ?>" data-bonus-percentage="<?= $persen; ?>"
                                    data-bonus-nominal="<?= $nominal; ?>" data-turnover="<?= $turnover; ?>"
                                    data-min-deposit="<?= $min_depo; ?>" data-min-wd="<?= $min_wd; ?>"
                                    data-max-bonus="<?= $max_wd; ?>">
                                    <?= $judul; ?>
                                    <?php if ($persen > 0): ?>
                                        (
                                        <?= $persen; ?>%
                                    <?php elseif ($nominal > 0): ?>
                                        (Rp
                                        <?= number_format($nominal); ?>
                                    <?php endif; ?>
                                    - TO x
                                    <?= $turnover; ?>)
                                </option>
                            <?php endwhile; ?>
                        </select>
                        <div class="promo-info-auto-mobile"
                            style="color: #FFD700; margin-top: 8px; font-size: 12px; display: none;">
                            <div class="promo-bonus-auto-mobile">Bonus: <span class="promo-bonus-text-auto-mobile">0%</span>
                            </div>
                            <div class="promo-min-deposit-auto-mobile">Minimal Deposit: <span
                                    class="promo-min-deposit-text-auto-mobile">Rp. 0</span></div>
                            <div class="promo-max-bonus-auto-mobile">Maksimal Bonus: <span
                                    class="promo-max-bonus-text-auto-mobile">Rp. 0</span></div>
                        </div>
                    </div>

                    <script>
                        function updatePromoInfoAutoMobile(select) {
                            const selectedOption = select.options[select.selectedIndex];
                            const promoInfo = document.querySelector('.promo-info-auto-mobile');

                            if (selectedOption.value) {
                                const bonusPercentage = selectedOption.getAttribute('data-bonus-percentage');
                                const maxBonus = selectedOption.getAttribute('data-max-bonus');
                                const minDeposit = selectedOption.getAttribute('data-min-deposit');

                                document.querySelector('.promo-bonus-text-auto-mobile').textContent = bonusPercentage + '%';
                                document.querySelector('.promo-min-deposit-text-auto-mobile').textContent = 'Rp. ' + parseFloat(
                                    minDeposit).toLocaleString('id-ID');
                                document.querySelector('.promo-max-bonus-text-auto-mobile').textContent = 'Rp. ' + parseFloat(
                                    maxBonus).toLocaleString('id-ID');

                                promoInfo.style.display = 'block';
                            } else {
                                promoInfo.style.display = 'none';
                            }
                        }
                    </script>

                    <div style="opacity: 0.66; font-size: 13px; margin-bottom: 4px;">
                        Jumlah
                    </div>
                    <div style="margin-bottom: 12px;">
                        <input type="tel" name="amount" class="form-control rupiah" placeholder="Minimal 10,000" value="">
                    </div>

                    <div style="margin-top: 20px;">
                        <button type="submit"
                            style="background-image: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #e99c05 0%, #f4ae00 8%, #f8bf33 25%, #f8ce19 62.5%, #ffdc02 100%); color: #fff; border: 0; width: 100%; font-weight: bold; border-radius: 25px; padding: 10px 0;">
                            Buat QRIS
                        </button>
                    </div>
                </div>

                <!-- QR Code Display Container (hidden by default or shown if has pending deposit) -->
                <div id="qr-container-mobile" style="display: none; text-align: center;">
                    <div style="margin-bottom: 15px;">
                        <h4 style="color: #FDB931; margin-bottom: 12px; font-size: 18px;">Scan QR Code untuk Membayar</h4>
                        <div id="qr-code-display-mobile"
                            style="background: #fff; padding: 15px; border-radius: 10px; display: inline-block;">
                            <!-- QR Code will be inserted here -->
                        </div>

                        <!-- Download QR Button -->
                        <div style="margin-top: 12px;">
                            <button type="button" id="download-qr-btn-mobile" class="btn btn-success"
                                style="background: #28a745; color: #fff; border: 0; font-weight: bold; border-radius: 25px; padding: 10px 30px; width: 100%;">
                                <i class="fas fa-download"></i> Download QR Code
                            </button>
                        </div>
                    </div>

                    <div
                        style="margin-bottom: 12px; padding: 12px; background: var(--secondary-color); border-radius: 8px; font-size: 13px;">
                        <div style="margin-bottom: 6px;">
                            <strong>Nomor Referensi:</strong><br>
                            <span id="ref-number-mobile">-</span>
                        </div>
                        <div style="margin-bottom: 6px;">
                            <strong>Jumlah:</strong><br>
                            Rp <span id="qr-amount-mobile">-</span>
                        </div>
                        <div style="margin-bottom: 6px;">
                            <strong>Berlaku hingga:</strong><br>
                            <span id="qr-expired-mobile">-</span>
                        </div>
                        <div>
                            <strong>Status:</strong><br>
                            <span
                                style="background-color: #17a2b8; color: #fff; padding: 4px 10px; border-radius: 4px; font-size: 11px;">
                                PROCESSING
                            </span>
                        </div>
                    </div>



                    <div
                        style="padding: 10px; background: #28a745; border-radius: 6px; color: #fff; font-size: 12px; margin-bottom: 10px;">
                        <i class="fas fa-info-circle"></i> Pembayaran akan otomatis diproses setelah Anda melakukan
                        pembayaran
                    </div>

                    <div style="padding: 10px; background: #ffc107; border-radius: 6px; color: #000; font-size: 12px;">
                        <i class="fas fa-sync fa-spin"></i> Halaman akan refresh otomatis untuk mengecek status pembayaran
                    </div>
                </div>
            </form>

                            <!-- TAB BANK TRANSFER (Desktop Version - Diubah seperti e-wallet) -->
                            <form method="post" class="from-prevent-multiple-submits" enctype="multipart/form-data"
                                style="display: none;" data-tab="bank">
                                <div style="font-size: 14px; margin-bottom: 6px;">
                                    Rekening Asal
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <?php
                                    $userbank = $bank_user . ' - ' . $no_rek_user . ' - ' . $nama_rek_user ?>
                                    <input type="text" name="user_bank_info" class="form-control" value="<?= $userbank ?>"
                                        readonly>
                                </div>

                                <div style="font-size: 14px; margin-bottom: 6px;">
                                    Bank Tujuan
                                </div>
                                <div class="select_box" style="margin-bottom: 20px; position: relative;">
                                    <select name="master_bank_accounts_id" class="master_bank_accounts_id form-control">
                                        <option value="">Pilih Bank Tujuan</option>
                                        <?php
                                        $bank = mysqli_query($koneksi, "SELECT * FROM bank WHERE status_bank = 'aktif' AND (jenis_bank = 'BANK' OR jenis_bank NOT IN ('QRIS', 'DANA', 'OVO', 'GOPAY', 'SHOPEEPAY', 'LINKAJA')) ORDER BY jenis_bank ASC");
                                        while ($data = mysqli_fetch_assoc($bank)): ?>
                                            <option value="<?= $data['id_bank']; ?>"
                                                data-account-number="<?= htmlspecialchars($data['nomor_rekening_bank']); ?>"
                                                data-account-name="<?= htmlspecialchars($data['atas_nama_bank']); ?>"
                                                data-bank-name="<?= htmlspecialchars($data['jenis_bank']); ?>"
                                                data-commission-type="<?= $data['komisi_type']; ?>"
                                                data-commission="<?= $data['komisi']; ?>">
                                                <?= strtoupper($data['jenis_bank']); ?> - <?= $data['nomor_rekening_bank']; ?>
                                                (<?= $data['atas_nama_bank']; ?>)
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                    <i class="fa fa-copy" onclick="setClipboard()"
                                        style="position: absolute; top: 0; right: 0; border-left: 1px solid #707070; padding: 10px; cursor: pointer;"></i>

                                    <div class="commission" style="color: #ECB222; margin: 10px 0; font-size: 16px;">
                                        Biaya Admin: <span class="admin-fee-text">0.00%</span>
                                    </div>
                                </div>

                                <div style="font-size: 14px; margin-bottom: 6px;">
                                    Pilih Promo
                                </div>
                                <div class="select_box2" style="margin-bottom: 20px; position: relative;">
                                    <select name="promo_id" class="promo_id form-control" style="padding-right: 35px;"
                                        onchange="updatePromoInfoAutoMobile(this)">
                                        <option value="">Tidak Menggunakan Promo</option>
                                        <?php
                                        $get_bonus = mysqli_query($koneksi, "
                                    SELECT id_bonus, judul, persentase, nominal, turnover, 
                                        min_depo, min_wd, max_wd 
                                    FROM bonus 
                                    WHERE status = 1
                                    ORDER BY judul ASC
                                ");

                                        while ($bonus = mysqli_fetch_assoc($get_bonus)):

                                            $id_bonus = (int) $bonus['id_bonus'];
                                            $judul = htmlspecialchars($bonus['judul']);
                                            $persen = (int) $bonus['persentase'];
                                            $nominal = (int) $bonus['nominal'];
                                            $turnover = (int) $bonus['turnover'];
                                            $min_depo = (int) $bonus['min_depo'];
                                            $min_wd = (int) $bonus['min_wd'];
                                            $max_wd = (int) $bonus['max_wd'];

                                            ?>
                                            <option value="<?= $id_bonus; ?>" data-bonus-percentage="<?= $persen; ?>"
                                                data-bonus-nominal="<?= $nominal; ?>" data-turnover="<?= $turnover; ?>"
                                                data-min-deposit="<?= $min_depo; ?>" data-min-wd="<?= $min_wd; ?>"
                                                data-max-bonus="<?= $max_wd; ?>">
                                                <?= $judul; ?>
                                                <?php if ($persen > 0): ?>
                                                    (
                                                    <?= $persen; ?>%
                                                <?php elseif ($nominal > 0): ?>
                                                    (Rp
                                                    <?= number_format($nominal); ?>
                                                <?php endif; ?>
                                                - TO x
                                                <?= $turnover; ?>)
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div style="font-size: 14px; margin-bottom: 6px;">
                                    Jumlah
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <input type="tel" name="amount" class="form-control rupiah" placeholder="Jumlah"
                                        value="">
                                </div>

                                <div style="font-size: 14px; margin-bottom: 6px;">
                                    Bukti Transfer <span style="color: #888; font-size: 11px;">(Opsional)</span>
                                </div>
                                <div style="margin-bottom: 22px;">
                                    <input type="file" name="receipt" class="form-control" accept="image/*">
                                </div>

                                <div style="text-align: center;">
                                    <input type="hidden" name="admin_fee_type" class="form-control admin_fee_type"
                                        value="1">
                                    <input type="hidden" name="admin_fee" class="form-control admin_fee" value="0.00">
                                    <input type="submit" class="btn btn-primary from-prevent-multiple-submits"
                                        value="Deposit"
                                        style="background-color: #FDC23A; color: #001739; border: 0; width: 20%; font-weight: bold; border-radius: 8px; padding: 10px 0;">
                                </div>
                            </form>

                            <form method="post" class="from-prevent-multiple-submits" enctype="multipart/form-data"
                                style="display: none;" data-tab="pulsa">
                                <!-- Form for Pulsa -->
                                <div> <!-- Pulsa deposit content --> </div>
                            </form>

                            <div style="margin: 30px 0 10px 0;">
                                7 Transaksi Deposit Auto Terakhir
                            </div>

                            <div style="display: block; overflow: auto; margin-bottom: 20px;">
                                <table width="100%">
                                    <tbody>
                                        <tr style="background-color: #FDC23A; color: #001739; font-weight: bold;">
                                            <td style="padding: 12px 5px;">Status</td>
                                            <td style="padding: 12px 5px;">Tanggal</td>
                                            <td style="padding: 12px 5px;">Tipe Tujuan</td>
                                            <td style="padding: 12px 5px;">Jumlah</td>
                                            <td style="padding: 12px 5px; text-align: center;">Lihat</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div style="margin-bottom: 20px;">
                                <ul id="game_list" style="list-style-type: none; padding: 0; margin-bottom: 0;">
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/1/uJtxngMXx3HsS4dm.png?s=bb07e27b4df34fdf7d26800ba9965c2a"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/2/pWlHpYVsCeIaC8Nx.png?s=531308644aeb30554a85bd1e504e6d10"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/3/Wn1Wjp9HdvtZoBHw.png?s=371515bc327a43225ff8b3863a7ab80b"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/4/URPO5DaqD7FqRC5n.png?s=e24d94d4d190750260d84d28337aff90"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/5/Nk0QQ9APErChtcLD.png?s=434a39480030d17ef6f28cfdd84ec3a9"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/6/jTxOsYtUm74xpbUU.png?s=306693d4b9a2b06924dd443285fb436d"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/7/Q9fj6bl8AeCPjpBK.png?s=9fc8240629172863407874ac212714f9"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/8/SciElCV9X184w0Wy.png?s=93889df210b2b7a7168b80f54f1cc6b1"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/9/HwUHtZBkoh1eSqIZ.png?s=4c607106434406704ca3ce7ef0030426"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/13/4OHA43A37Dgx9yZX.png?s=19b9c411a56ea2635af70b657485f9a6"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/14/NnE0IoOfZdTSg5LR.png?s=acadbef12ec5a2bddb646d7f169629ba"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/15/GVpke0JZIy82EEYX.png?s=e595e5a0a0a3aac0e99ecaa6c282e485"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/16/HXanHMALEnoy35vp.png?s=b68413845e606dcf1ca01f3ac97a5537"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/17/I31Wurv5KJFIJFs8.png?s=5ddafafb5a73c9de705d9d5829bef829"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/18/wjLNHkv8m2ar31cI.png?s=a54b981ac217e54cfbd783f41722e179"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/19/cO3lZ7zt0TdGhCjz.png?s=45140af0a50e033332fe4df4606925ca"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/20/8LEt8UakcCMCc9Xa.png?s=7b2d662695116b6a9b670af8d523d26f"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/21/HhE5AJ1y0JfVh8EV.png?s=19c7a52ca4cef69f04a66ff4176ff928"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/22/yfsfHmcCkReGkrx3.png?s=eb73e03a6774b1c6c72a3d8558f8e4b5"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/23/4ytHfquY5Is5wIKB.png?s=87c3febb225ec859e097f94545a60428"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/24/mRLLRada5hPKPVuO.png?s=3dd0f89b03bec7a779b1846fce2d1ec9"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/25/2S3WCKs7grfw0N5G.png?s=f0f558575613757aa72ef570f75fdcc6"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/26/XuyvpHGWfxfHe9kc.png?s=2193f6c7641b37b8e0934cd311420584"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/27/EJevIAPTKbnO5jFS.png?s=7481667fc2941f36f6eac10ce2a26ce6"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/28/hSmij1SdgNK7UBuJ.png?s=8a0f83725fd3ff1538ebf81653522c3e"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/29/ph5Qseor0YwMFBnW.png?s=27f649d82450682aae3e7331eb409e11"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A; margin-right: 1%;">
                                        <div style="display: flex;">
                                            <div class="lamp-fail"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/30/mDBkLaiyFJ2bqyEL.png?s=5d84e3a1a224d08e1b7e2e7a90caa0cf"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                    <li
                                        style="display: inline-block; padding: 8px 1%; width: 13%; margin-bottom: 12px; background-color: var(--secondary-color); border-left: 3px solid #FDC23A;">
                                        <div style="display: flex;">
                                            <div class="lamp-success"></div>
                                            <img src="https://rajabotak.dataklmsad902.site/images/bank-list/31/TM7W5qUR4R2LJeAE.png?s=c87ee4ce0138f991a6d25bc530eecccc"
                                                style="width: calc(100% - 20px);">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php include 'template/footer.php'; ?>

<script>
    // Script untuk menampilkan gambar QRIS saat dipilih (untuk e-wallet tab)
    $(document).ready(function() {
        $('#master_bank_select').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var jenisBank = selectedOption.data('jenis');
            var gambarBank = selectedOption.data('gambar');
            
            // Cek apakah yang dipilih adalah QRIS
            if (jenisBank && jenisBank.toUpperCase() === 'QRIS' && gambarBank) {
                // Tampilkan gambar QRIS
                var imagePath = '../assets/img/bank_admin/' + gambarBank;
                $('#qris-preview-img').attr('src', imagePath);
                $('#qris-preview-container').show();
            } else {
                // Sembunyikan preview gambar
                $('#qris-preview-container').hide();
                $('#qris-preview-img').attr('src', '');
            }
        });
    });
</script>

<script>
    (function () {
        // toggle active class and show/hide forms by data-tab
        const tabs = document.querySelectorAll('#deposit-tabs .tab');
        const forms = document.querySelectorAll('.deposit-form');

        function setActive(tabName) {
            tabs.forEach(t => {
                t.classList.toggle('tab-active', t.dataset.tab === tabName);
                t.classList.toggle('tab-nonactive', t.dataset.tab !== tabName);
            });

            forms.forEach(f => {
                if (f.dataset.tab === tabName) {
                    f.style.display = 'block';
                } else {
                    f.style.display = 'none';
                }
            });
        }

        tabs.forEach(t => {
            t.addEventListener('click', function () {
                setActive(this.dataset.tab);
            });
        });

        // inisialisasi: pilih tab pertama yang aktif pada DOM (jika ada)
        const initially = Array.from(tabs).find(t => t.classList.contains('tab-active'))?.dataset.tab || 'auto';
        setActive(initially);
    })();
</script>

<script>
    function loadLastDeposits() {
        $.ajax({
            url: './function/last_deposit.php',
            type: 'GET',
            dataType: 'json',
            success: function (res) {
                if (!res.success || res.data.length === 0) {
                    $('#tabelDeposit tbody').html(`
                    <tr>
                        <td colspan="5" style="padding:20px;text-align:center;color:#C4C4C4;">
                            Belum ada transaksi deposit.
                        </td>
                    </tr>
                `);
                    return;
                }

                let rows = '';
                res.data.forEach(d => {
                    let badge = '';
                    if (d.status == 'Pending') badge = '<span style="color:#ffb300;">Pending</span>';
                    else if (d.status == 'Sukses') badge = '<span style="color:#04AA6D;">Berhasil</span>';
                    else badge = '<span style="color:#e74c3c;">Gagal</span>';

                    rows += `
                    <tr style="border-bottom:1px solid #333;">
                        <td style="padding:8px;">${badge}</td>
                        <td style="padding:8px;">${d.created_at}</td>
                        <td style="padding:8px;">${d.bank_asal || '-'}</td>
                        <td style="padding:8px;">${d.bank_tujuan || '-'}</td>
                        <td style="padding:8px;">Rp ${parseInt(d.jumlah).toLocaleString('id-ID')}</td>
                    </tr>
                `;
                });
                $('#tabelDeposit tbody').html(rows);
            }
        });
    }

    $(document).ready(loadLastDeposits);
</script>

<script>
    $('#form-manual').on('submit', function (e) {
        e.preventDefault();

        const form = $(this);
        const formData = new FormData(this);
        const btn = form.find('button[type="submit"]');

        btn.prop('disabled', true).text('Memproses...');

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    alert(res.message);
                    window.location.reload();
                } else {
                    alert(res.message);
                }
            },
            error: function (xhr, status, error) {
                alert('Terjadi kesalahan jaringan: ' + error);
            },
            complete: function () {
                btn.prop('disabled', false).text('Deposit');
            }
        });
    });
</script>

<script>
    $('#form-bank-mobile').on('submit', function (e) {
        e.preventDefault();

        const form = $(this);
        const formData = new FormData(this);
        const btn = form.find('button[type="submit"]');

        btn.prop('disabled', true).text('Memproses...');

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    alert(res.message);
                    window.location.reload();
                } else {
                    alert(res.message);
                }
            },
            error: function (xhr, status, error) {
                alert('Terjadi kesalahan jaringan: ' + error);
            },
            complete: function () {
                btn.prop('disabled', false).text('Deposit Bank');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#form-auto-mobile').on('submit', function (e) {
            e.preventDefault();

            var $form = $(this);
            var $submitBtn = $form.find('button[type="submit"]');
            var originalBtnText = $submitBtn.html();

            $submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Memproses...');

            var formData = {
                _token: $('input[name="_token"]').val(),
                amount: $form.find('input[name="amount"]').val().replace(/,/g, ''),
                promo_id: $form.find('select[name="promo_id"]').val()
            };

            $.ajax({
                url: './function/proses_depo_otomatis.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        $('#form-container-mobile').hide();
                        $('#qr-container-mobile').show();

                        if (response.data.qr_image) {
                            $('#qr-code-display-mobile').html('<img src="' + response.data.qr_image + '" alt="QR Code" style="max-width: 250px; width: 100%;" id="qr-code-image-mobile">');
                        }

                        $('#ref-number-mobile').text(response.data.reference_number);
                        $('#qr-amount-mobile').text(response.data.amount);

                        var expiredDate = new Date(response.data.expired_at);
                        $('#qr-expired-mobile').text(expiredDate.toLocaleString('id-ID'));

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            confirmButtonColor: '#FDB931'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: response.message,
                            confirmButtonColor: '#dc3545'
                        });
                    }
                },
                error: function (xhr) {
                    var errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: errorMessage,
                        confirmButtonColor: '#dc3545'
                    });
                },
                complete: function () {
                    $submitBtn.prop('disabled', false).html(originalBtnText);
                }
            });
        });

        $('#download-qr-btn-mobile').on('click', function () {
            var refNumber = $('#ref-number-mobile').text() || 'QR-Code';
            var filename = 'QRIS-' + refNumber + '.png';

            var $img = $('#qr-code-display-mobile img');
            if ($img.length > 0) {
                var imageUrl = $img.attr('src');
                var a = document.createElement('a');
                a.href = imageUrl;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'QR Code berhasil didownload',
                    confirmButtonColor: '#28a745',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    });
</script>

<script>
    (function () {
        $('.from-prevent-multiple-submits').on('submit', function () {
            $('.from-prevent-multiple-submits').attr('disabled', 'true');
        })
    })();

    function setClipboard() {
        value = $('.master_bank_accounts_id').find('option:selected').attr('data-account-number');
        var tempInput = document.createElement("input");
        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
        tempInput.value = value;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        $('.copy-success').html('').append(
            '<div style="padding: 10px; background-color: #04AA6D; border-radius: 6px; width: 90%; margin: 0 auto 20px auto;">' +
            'Copy nomor rekening sukses !' +
            '</div>');

        setTimeout(function () {
            $('.copy-success').html('');
        }, 3000);
    }

    function setClipboardBank() {
        value = $('#master_bank_select_bank').find('option:selected').attr('data-account-number');
        var tempInput = document.createElement("input");
        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
        tempInput.value = value;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        $('.copy-success').html('').append(
            '<div style="padding: 10px; background-color: #04AA6D; border-radius: 6px; width: 90%; margin: 0 auto 20px auto;">' +
            'Copy nomor rekening sukses !' +
            '</div>');

        setTimeout(function () {
            $('.copy-success').html('');
        }, 3000);
    }

    $.fn.currency = function (num) {
        n = parseInt(num.replace(new RegExp(",", "g"), ''));
        newn = n.toFixed(0).replace(/./g, function (c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
        });
        $.isNumeric(n) ? this.val(newn) : this.val('');
    };

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = number.toFixed(decimals);
        var nstr = number.toString();
        nstr += '';
        x = nstr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? dec_point + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');
        return x1 + x2;
    }

    $(function () {
        $(document).on('keyup', '.rupiah', function () {
            $(this).currency($(this).val());
        });
    });

    $(document).on('submit', '#form-manual, #form-auto, #form-bank-mobile', function (e) {
        var $amountField = $(this).find('input[name="amount"]');
        var rawValue = $amountField.val().replace(/,/g, '');
        $amountField.val(rawValue);
    });

    function downloadImage(url, fileName) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.responseType = "blob";
        xhr.onload = function () {
            var urlCreator = window.URL || window.webkitURL;
            var imageUrl = urlCreator.createObjectURL(this.response);
            var tag = document.createElement('a');
            tag.href = imageUrl;
            tag.download = fileName;
            document.body.appendChild(tag);
            tag.click();
            document.body.removeChild(tag);
        };
        xhr.send();
    }
    $('.save-qr').click(function () {
        downloadImage($('.master_bank_accounts_id').find('option:selected').attr('data-path'), 'QR-Untung');
    });
    $(document).on('change', '.master_bank_accounts_id', function () {
        var $form = $(this).closest('form');
        var $showQr = $form.find('.show-qr');
        var $qrImage = $form.find('.qr-image');
        var $commission = $form.find('.commission');
        var $adminFeeType = $form.find('.admin_fee_type');
        var $adminFee = $form.find('.admin_fee');

        var selectedOption = $(this).find('option:selected');
        var dataPath = selectedOption.attr('data-path') || selectedOption.attr('data-qr-code');
        var dataBank = selectedOption.attr('data-bank') || selectedOption.attr('data-bank-name');
        var dataId = selectedOption.attr('data-id') || selectedOption.attr('data-account-number');
        var dataName = selectedOption.attr('data-name') || selectedOption.attr('data-account-name');

        if (dataPath && dataPath != '' && dataPath != 'null') {
            $showQr.css('display', 'flex');
            var imgPath = dataPath.includes('storage/') ? '/' + dataPath : '/storage/' + dataPath;
            $qrImage.html('').append('<img src="' + imgPath + '" style="width: 100%;">');
        } else {
            $showQr.css('display', 'none');
        }

        $('.modal-bank-name').html(dataBank);
        $('.modal-account-info').html(dataId + ' a.n ' + dataName);
        $('.modal-qr-image').html(
            (dataPath && dataPath != '' && dataPath != 'null' ? '<img src="' + (dataPath.includes('storage/') ?
                '/' + dataPath : '/storage/' + dataPath) + '" style="width: 100%;">' : '')
        );

        value_commission_type = selectedOption.attr('data-commission-type');
        value_commission = selectedOption.attr('data-commission');
        if (value_commission_type === '1' || value_commission_type === 'percentage') {
            $commission.html('Biaya Admin: ' + (value_commission !== "" && value_commission ? value_commission +
                '%' : '0.00%'));
        } else {
            $commission.html('Biaya Admin: ' + (value_commission !== "" && value_commission ? 'Rp. ' +
                number_format(Number(
                    value_commission), 0, ',', '.') : 'Rp. 0'));
        }
        $adminFeeType.val(value_commission_type);
        $adminFee.val(value_commission);
    });

    $(document).on('change', '#master_bank_select_bank', function () {
        var $form = $(this).closest('form');
        var $commission = $form.find('.commission-bank .admin-fee-text-bank');
        var $adminFeeType = $form.find('.admin_fee_type_bank');
        var $adminFee = $form.find('.admin_fee_bank');

        var selectedOption = $(this).find('option:selected');
        var value_commission_type = selectedOption.attr('data-commission-type');
        var value_commission = selectedOption.attr('data-commission');

        if (value_commission_type === '1' || value_commission_type === 'percentage') {
            $commission.html((value_commission !== "" && value_commission ? value_commission + '%' : '0.00%'));
        } else {
            $commission.html((value_commission !== "" && value_commission ? 'Rp. ' + number_format(Number(value_commission), 0, ',', '.') : 'Rp. 0'));
        }
        $adminFeeType.val(value_commission_type);
        $adminFee.val(value_commission);
    });
</script>