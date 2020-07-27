    <section class="error-area bg_cover" style="background-image: url(<?=config_item('base_url');?>assets/images/login-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <div class="login-box">
                        <div class="login-title text-center">
                            <img src="<?=config_item('base_url');?>assets/images/logo-2.png" alt="logo">
                            <h3 class="title">Create an Account!</h3>
                        </div>
                        <center><?=$this->session->flashdata('verify_msg');?></center>
                        <div class="login-input">
                            <?php $attributes = array("name" => "registrationform"); echo form_open("signup", $attributes); ?>
                                <div class="input-box mt-10">
                                    <input type="text" placeholder="referral" value="<?=set_value('referral');?>" readonly name="referral">
                                    <span class="text-danger"><?=form_error('referral');?></span>
                                </div>
                                <div class="input-box mt-10">
                                    <input type="text" placeholder="Name" value="<?php echo set_value('name'); ?>" name='name'>
                                    <span class="text-danger"><?=form_error('name');?></span>
                                </div>
                                <div class="input-box mt-10">
                                    <input type="text" placeholder="Email" value="<?=set_value('email');?>" name='email'>
                                    <span class="text-danger"><?=form_error('email'); ?></span>
                                </div>
                                <div class="input-box mt-10">
                                    <select class="form-control input-lg" onchange="print_state('state', this.selectedIndex);" id="country" required  name="country" value="<?=set_value('country');?>"/></select>
                                    <script language="javascript">print_country("country");</script>
                                    <span class="text-danger"><?=form_error('country'); ?></span>
                                </div>
                                <div class="input-box mt-10">
                                    <select  name ="state" required=""  id ="state" class="input-box form-control"><option value="<?=set_value('state'); ?>">Select state</option></select>
                                    <span class="text-danger"><?=form_error('state'); ?></span>
                                </div>
                                <div class="input-box mt-10">
                                    <input type="password" name="password" placeholder="Password">
                                    <span class="text-danger"><?=form_error('password');?></span>
                                    <ul class="checkbox_common checkbox_style5">
                                        <li>
                                            <input type="checkbox" name="checkbox5" id="checkbox13" required="">
                                            <label for="checkbox13"><span></span>I agree to the Terms of Service and Privacy Policy</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="input-btn mt-10">
                                    <button class="main-btn" type="submit">Signup  <i class="fal fa-arrow-right"></i></button>
                                    <?=form_close();?>
                                    <br>
                                    <center><span class="bg-primary" style="color:white; text-align:center"><?=$this->session->flashdata('msg');?></span></center>
                                    <span>Already have an account? <a href="login">Singin</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>