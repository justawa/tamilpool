<div class="row justify-content-center"  style="margin-top:5%;"   id="success" >

    <div class="col-md-6">
        <div class="card">
<div class="line"></div>
      <div class="card-header" style="background-color:#f4dbf9">
      <h4>Activity</h4>
      </div>

<form method="POST" action="" id="fupform" name="form1" class="form-container container" >

            <ul id="progressbar">
               <li class="active"></li>
               <li></li>
               <li></li>

            </ul>

            <fieldset>
              <div class="row" >
              <div class="col-md-4 list_container">
              <div class="card-body">


                   <?php while($r = mysqli_fetch_assoc($sql)) { ?>

                          <!-- <span class="span">&#8593;</span> -->
                    <!-- <button type="button" class="btn btn-primary add_more_button show " data-id="<?php echo $r['id'] ?>" style="margin-left:246%; margin-bottom:10px;" ><?php echo $r['activity']; ?></button> -->
                <div class="form-group row" >
                 <div class="col-md-4">
                    <input style="visibility: visible; height: auto;width: 137px;margin: 00px;padding: 0;" id="firststep_1" type="button" data-id="<?php echo $r['id'] ?>"  name="next" class="add_more_button show next-step" value="<?php echo $r['activity']; ?>" />


                        </div>
                    </div>
                  <?php } ?>

                    </div> </div>

                    <textarea id="para" class="col-md-4 display ">
                    </textarea>

                     </div>

                           <div class="col-md-8 " style="margin-top:20px;">

                           <div class="row ">
                   <input class="col-md-4 block " style="margin-left:115px;"  id="date" autocomplete="family-name" type="text">
                       <input class="col-md-4 block "  id="time" autocomplete="family-name" type="text">
                           </div>

                           </div>

               <input style="visibility: visible; height: auto;width: 200px;margin: 15px;padding: 0;" id="firststep_1" type="button"  class="next action-button next-step" value="Proceed To Pay" />

            </fieldset>

            <fieldset id="laststep" class="container">


              <!----------------- 1 ------------------------------>
              <div id="contact-details" class="section_1 form-tab visible">

                 <div class="clearfix"></div>
                 <div class="field required field-size-half nowrap">
                    <label for="">First name</label>
                    <i class="field-icon icon-name"></i><input name="first_name" id="first_name" autocomplete="given-name" type="text">
                    <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                 </div>
                 <div class="field required field-size-half nowrap ">
                    <label for="">Last name</label>
                    <i class="field-icon icon-name"></i><input name="last_name" id="last_name" autocomplete="family-name" type="text">
                    <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                 </div>
                 <div class="clearfix"></div>
                 <div class="field required field-size-full">
                    <label for="">Email Address</label>
                    <i class="field-icon icon-email"></i><input name="email" id="email" autocomplete="email" type="email">
                    <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                    <div id="emailSuggestion" style="display:none;"></div>
                 </div>
                 <div class="clearfix"></div>
                 <div class="field required field-size-full">
                    <label for="">Phone number</label>
                    <i class="field-icon icon-mobile"></i>
                    <input id="phone" name="phone" autocomplete="tel" data-type="input-textbox" class="form-textbox validate[required, Fill Mask]" size="30" maskvalue="(999)-999-9999" data-masked="true" value="" data-component="textbox" type="tel">
                    <span class="msg-error-required-block nowrap"><span class="little-red-triangle"></span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                 </div>
                 <div class="clearfix"></div>
                 <div class="field required field-size-full">
                    <label for="">Zip code</label>
                    <i class="field-icon icon-location"></i>
                    <input id="zip_code" name="zip_code" type="text" autocomplete="postal-code" class="form-textbox validate[required, Fill Mask]" size="30" value="" pattern="[0-9]*" inputmode="numeric" maxlength="5">
                    <span class="msg-error-required-block nowrap"><span class="little-red-triangle">
                    </span><span class="msg-error-required"><i class="fa fa-warning-triangle"></i>Required</span></span>
                 </div>



                 <div class="clearfix"></div>
                 <div class="field required field-size-full">
                    <label for="">Where did you hear about us?</label>
                    <i class="field-icon icon-location"></i>
                  <select tye="select" name="about_us" value="" id="about_us">
                    <option>XYZ</option>
                      <option>ABC</option>
                      <option>MNO</option>
                  </select>
                 </div>
                    <div class="clearfix"></div>
                 <div class="field required field-size-full">
                    <label for="">Swim Lesson Agreement</label>

                    <textarea id="agreement" name="agreement" type="text" autocomplete="postal-code" class="form-textbox validate[required, Fill Mask]" size="30" value="" pattern="[0-9]*" inputmode="numeric" maxlength="5">
                    </textarea>
                 </div>
                 <br><br>
                    <div class="clearfix"></div>
                <label>I have read and agree to the Liability Release, Assumption of Risk, and Policies. *</label><br>
                <input type="checkbox" name="vehicle1" value="Bike"> YES<br>
                    <button type="submit" id="butsave" class="btn btn-primary next-step showes">Submit</button>

                 <div class="clearfix"></div>


                   <input style="visibility: visible; height: auto;width: 200px;margin: 15px;padding: 0;" id="firststep_1" type="button" name="next" class="next action-button next-step"  value="Next"/>

              </div>


            </fieldset>


        </div>
        </form>
    </div>

   

</div>


