<?php foreach ($entryforms as $entryform): //pr($entryform); ?>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-3 form-group">
                    </div>

                    <div class="col-md-6 form-group">
                        <p style="text-align: center; font-size: 16px">
                            গণপ্রজাতন্ত্রী বাংলাদেশ সরকার <br>
                            উপজেলা নির্বাহী অফিসারের কার্যালয় <br>
                            শাহরাস্তি, চাঁদপুর <br>
                            shahrasti.chandpur.gov.bd
                        </p>
                    </div>

                    <div class="col-md-3 form-group">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 form-group">
                        <label>কলসেন্টার রেফারেন্স আইডি:</label>
                    </div>

                    <div class="col-md-2 form-group">
                        <p><?php echo h($entryform['Entryform']['id']); ?></p>
                    </div>

                    <div class="col-md-8 form-group">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 form-group">
                        <label>সার্ভিস এন্ট্রির তারিখ:</label>
                    </div>

                    <div class="col-md-2 form-group">
                        <p>00152</p>
                    </div>

                    <div class="col-md-8 form-group">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 form-group">
                        <label>সংশ্লিষ্ট দপ্তরের নাম:</label>
                    </div>

                    <div class="col-md-2 form-group">
                        <p>00152</p>
                    </div>

                    <div class="col-md-8 form-group">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 form-group">
                        <label>বিষয়: </label>
                    </div>

                    <div class="col-md-2 form-group">
                        <p>00152</p>
                    </div>

                    <div class="col-md-8 form-group">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 form-group">
                        <p>উপর্যুক্ত বিষয় ও সূত্রে আপনার জ্ঞাতার্থে জানানো যাচ্ছে যে, উপজেলা কল সেন্টারে নিম্নলিখিত নাগরিক অভিযোগ/তথ্য ও সেবাসংক্রান্ত আবেদন/মতামত/সুপারিশ সংক্রান্ত বিষয়টি আপনার অবগতি ও প্র্রয়োজনীয় ব্যবস্থা গ্রহণের জন্য অনুরোধ করা হ’ল-</p>
                    </div>

                    <div class="col-md-2 form-group">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 form-group">
                        <span>অভিযোগ কারীর নাম ও ঠিকানা:</span>
                    </div>

                    <div class="col-md-10 form-group">
                        <p>text goes to here</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <p>বিস্তারিত এখানে বসবে .....................................................................................................................।</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <p>জনাব ...........<br>................<br>.............।</p>
                    </div>

                    <div class="col-md-6 form-group">
                        <p style="text-align: center">
                            উপজেলা নির্বাহী অফিসার <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;শাহরাস্তি, চাঁদপুর <br>
                            মোবাইল নং : ০১৭৩০০৬৭০৬৮<br>
                            ইমেইল :unoshahrastichandpur@gmail.com
                        </p>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6 form-group">
                        <p>
                            বিতরণ: সদয় অবগতি/অবগতি ও কার্যার্থে  <br>
                            ১. চেয়ারম্যান, উপজেলা পরিষদ, শাহরাস্তি, চাঁদপুর <br>
                            ২. ………………………….
                            ৩…………………………..
                        </p>
                    </div>

                    <div class="col-md-6 form-group">

                    </div>
                </div>


            </div>
            <div class="panel-footer">
                <button class="btn btn-success " type="submit">Print</button>
                <button class="btn btn-success " type="submit">Download</button>
            </div>
        </div>
    </div>
</div>

<?php endforeach ?>