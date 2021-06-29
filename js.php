<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/moment.js"></script>
  <!-- <script>
      jQuery(function($) {
          jQuery.noConflict();
      });
  </script> -->

  <!-- <script src="js/moment.js"></script> -->



  <script>
      jQuery(document).ready(function() {
          jQuery(".show").click(function() {
              var id = jQuery(this).data('id');
              var name = jQuery(this).text();
              jQuery(".show").removeClass('active-activity');
              jQuery(this).addClass('active-activity');

            //   console.log(id);

              jQuery.ajax({
                  type: "Post",
                  url: "table_select.php",
                  data: {
                      id: id
                  },
                  success: function(data) {
                    //   console.log(data);
                      var obj = jQuery.parseJSON(data);

                      // console.log(obj);

                      jQuery("#para").show();
                      jQuery("#para1").text(obj[0].activity);

                    jQuery("#calculated_days").text(obj[0].days);

                      jQuery("#message").val(obj[0].msg);
                      jQuery("#about_course").text(obj[0].about_course);
                      jQuery("#image").attr('src', 'activity_image/' + obj[0].activity_image);
                      jQuery("#repertion").val(obj[0].reperation);
                      jQuery("#group").val(obj[0].groupspot);
                      if (obj[0].groupspot == 0) {
                        //   console.log(obj[0].groupspot);
                          $("#firststep_1").hide();
                          $("#activity-message").html(`<span style="color: red">Spot not available</span>`);
                      } else {
                          $("#firststep_1").show();
                      }

                      jQuery("#comment").val(obj[0].comment);

                      jQuery("#instructor").val(obj[0].instructor);
                      jQuery("#price").val(obj[0].price);
                      const activity_start_date = moment(obj[0].start_date).format('DD/MM/YYYY');
                      const activity_end_date = moment(obj[0].end_date).format('DD/MM/YYYY');
                      jQuery("#start_date").val(activity_start_date);
                      jQuery("#end_date").val(activity_end_date);

                      if(obj[0].agreement != ''){
                        jQuery("#d_agreement").html(obj[0].agreement);
                      }

                      // jQuery(".time").val(obj.start_time);
                      // jQuery(".date").val(obj.start_date);
                      // jQuery(".endtime").val(obj.end_time);
                      // jQuery(".enddate").val(obj.end_date);


                      jQuery("#final-left-image").attr('src', 'activity_image/' + obj[0].activity_image);
                      jQuery("#para2").text(obj[0].activity);
                      jQuery("#final-start-date").text(activity_start_date);
                      jQuery("#final-end-date").text(activity_end_date);
                      jQuery("#final-details").text(obj[0].msg);
                      jQuery("#final-instructor").text(obj[0].instructor);
                      jQuery("#final-price").text(obj[0].price);

                      jQuery("#actual-price-td").text(obj[0].price);

                      $('input[name="item_name"]').val(obj[0].activity);
                    //   $('input[name="item_number"]').val(1); //change later
                      $('input[name="amount"]').val(obj[0].price);

                      //console.log(obj.length);
                      jQuery("#useractivitydetail").html('');
                      jQuery("#useractivitydetail_thirdstep").html('');
                      var objCount = obj.length;

                      for (i = 0; i < objCount; i++) {
                          //${obj[i].start_time}

                        //   console.log(obj[i]);


                          jQuery("#useractivitydetail").append(`
                          
                          <div class="col-md-12" style="font-size: 20px;font-weight: 400; "><hr>${obj[i].day}</div>
                          <div class="field col-md-6  field-size-half nowrap fill-box">
                          <div class="icon-position">
                            <i class="fa fa-clock-o icon-usd" aria-hidden="true"></i>
                            <input name="name5" id="time" autocomplete="off" type="text" style="margin-left:0%;" value="${obj[i].start_time}" readonly>
                            <label for="">שעת התחלה:</label> 
                            </div>
                            </div>
                            <div class="field col-md-6  field-size-half nowrap fill-box">
                             <div class="icon-position">
                            <i class="fa fa-clock-o icon-usd" aria-hidden="true"></i>
                            <input name="name6" id="endtime" autocomplete="off" type="text" value="${obj[i].end_time}" readonly>
                            <label for="">שעת סיום:</label>
                            </div>
                            </div>
                            `)


                          jQuery("#useractivitydetail_thirdstep").append(`<tr>
                              <td>${obj[i].day}</td>
                              <td>${obj[i].start_time}</td>
                              <td>${obj[i].end_time}</td><tr>`)

                      }


                  },
                  failure: function(err) {
                    // console.log(err);
                  }
              });


          });

          jQuery("#activity1").trigger("click");

          //   jQuery(".hide").click(function(){
          //     jQuery("#para").hide();
          // });



          jQuery('select[name="payment_type"]').change(function() {
            var payment_type = $(this).val();

            if(payment_type == 'offline'){
                $("#payment_type_value").val("offline");
                $("#type_offline").show();
                $("#type_paypal").hide();
                // $("#query_modal").modal('show');
            }

            if(payment_type == 'paypal'){
                $("#payment_type_value").val("paypal");
                $("#type_offline").hide();
                $("#type_paypal").show();
            }
          });
      });



  </script>


  <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function(event) {
          var currentFs, nextFs, previousFs; //fieldsets
          var left, opacity, scale; //fieldset properties which we will animate
          var animating; //flag to prevent quick multi-click glitches

          // var isInViewport = function isInViewport(elem) {
          //     var bounding = elem.getBoundingClientRect();
          //     return bounding.top >= 0 && bounding.left >= 0 && bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) && bounding.right <= (window.innerWidth || document.documentElement.clientWidth);
          // };
          var yesterday = new Date();


          // window.addEventListener('scroll', function () {
          //     var form = document.getElementById('msform');
          //     if (!isInViewport(form)) {
          //         jQuery('#headerQuote').show();
          //     } else {
          //         jQuery('#headerQuote').hide();
          //     }
          // });

          jQuery('.next').click(function(e) {
              if (animating) {
                  return false;
              }
              animating = true;

              currentFs = jQuery(this).parent().parent().parent();
              nextFs = jQuery(this).parent().parent().parent().next();

              if (jQuery(this).hasClass('radio-next-js')) {
                  currentFs = jQuery(this).closest('fieldset');
                  nextFs = currentFs.next();
              }

              //activate next step on progressbar using the index of nextFs
              jQuery('#progressbar li').eq(jQuery('fieldset').index(nextFs)).addClass('active');

              //show the next fieldset
              nextFs.show();

              //hide the current fieldset with style
              currentFs.animate({
                  opacity: 0
              }, {
                  step: function step(now, mx) {

                      //as the opacity of currentFs reduces to 0 - stored in "now"
                      //1. scale currentFs down to 80%
                      scale = 1 - (1 - now) * 0.2;

                      //2. bring nextFs from the right(50%)
                      left = now * 50 + '%';

                      //3. increase opacity of nextFs to 1 as it moves in
                      opacity = 1 - now;
                      currentFs.css({
                          'transform': 'scale(' + scale + ')',
                          'position': 'absolute'
                      });
                      nextFs.css({
                          'left': left,
                          'opacity': opacity
                      });
                  },
                  duration: 800,
                  complete: function complete() {
                      currentFs.hide();
                      animating = false;
                  }

                  //this comes from the custom easing plugin
                  // easing: 'easeInOutBack'
              });
          });

          jQuery('.previous').click(function() {
              if (animating) {
                  return false;
              }
              animating = true;

              currentFs = jQuery(this).parent().parent().parent();
              previousFs = jQuery(this).parent().parent().parent().prev();

              //de-activate current step on progressbar
              jQuery('#progressbar li').eq(jQuery('fieldset').index(currentFs)).removeClass('active');

              //show the previous fieldset
              previousFs.show();

              //hide the current fieldset with style
              currentFs.animate({
                  opacity: 0
              }, {
                  step: function step(now, mx) {

                      //as the opacity of currentFs reduces to 0 - stored in "now"
                      //1. scale previousFs from 80% to 100%
                      scale = 0.8 + (1 - now) * 0.2;

                      //2. take currentFs to the right(50%) - from 0%
                      left = (1 - now) * 50 + '%';

                      //3. increase opacity of previousFs to 1 as it moves in
                      opacity = 1 - now;
                      currentFs.css({
                          'left': left
                      });
                      previousFs.css({
                          'transform': 'scale(' + scale + ')',
                          'opacity': opacity
                      });
                  },
                  duration: 800,
                  complete: function complete() {
                      currentFs.hide();
                      previousFs.css({
                          'position': 'relative'
                      });
                      animating = false;
                  }

                  //this comes from the custom easing plugin
                  // easing: 'easeInOutBack'
              });
          });

          jQuery('#zipfrom').keyup(function() {
              var zipfrom_val = jQuery(this).val();
              // var zipfrom_val = jQuery( '#zipfrom' ).val();
              // if (zipfrom_val.length >= 5 && jQuery('#zipto').val().length >= 5) {
              //     jQuery('#firststep_1').click();
              // }
          });



          jQuery('#mainform').on('submit', function(e) {
              e.preventDefault();

              var jQueryform = jQuery(this);
              // var data = jQueryform.serialize();
              var form = document.getElementById('msform');
              var formData = serializeArray(form);

              jQuery.post(plumb_ajax.ajax_url, formData, function(data) {
                  var response = JSON.parse(data);
                  if (response.success == true) {
                      redirect();
                  }
              }, 'json').done(function() {}).fail(function(xhr, textStatus, errorThrown) {
                  alert('somthing goes wrong');
              }).always(function() {});
          });

          function redirect() {
              var url = jQuery('input[name=REDIRECT]').val();
              setTimeout(function() {
                  window.location.replace(url);
              }, 1500);
          }

          jQuery('#msform input:not([type=hidden])').keyup(function() {
              var empty = false;
              jQuery('#msform input').each(function() {
                  if (jQuery(this).val() == '') {
                      empty = true;
                  }
              });
              if (empty) {
                  jQuery('#formSend').attr('disabled', 'disabled');
              } else {
                  jQuery('#formSend').removeAttr('disabled');
              }
          });

          var serializeArray = function serializeArray(form) {
              var serialized = [];
              for (var i = 0; i < form.elements.length; i++) {
                  var field = form.elements[i];
                  if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue;
                  if ('select-multiple' === field.type) {
                      for (var n = 0; n < field.options.length; n++) {
                          if (!field.options[n].selected) {
                              continue;
                          }
                          serialized.push({
                              name: field.name,
                              value: field.options[n].value
                          });
                      }
                  } else if ('checkbox' !== field.type && 'radio' !== field.type || field.checked) {
                      serialized.push({
                          name: field.name,
                          value: field.value
                      });
                  }
              }
              return serialized;
          };
      });
  </script>


  <script>
      jQuery(function($) {
          jQuery("#checkbox").change(function(e) {
              if ($(this).is(':checked')) {
                  var hasError = commonvalidation();
                  if(hasError) {
                    jQuery("#firststep_2").hide();
                    $(this).attr("checked", false);
                    $("#form_validation_error").html('<span style="color: red">בבקשה תמלא את כל השדות</span>');
                  }
                  else {
                    $("#form_validation_error").html('');
                    jQuery("#firststep_2").show();
                  }    
              } else {
                  $("#form_validation_error").html('');
                  jQuery("#firststep_2").hide();
              }

              e.stopPropagation();

          });

          // jQuery("#checkbox").click(function(e) {
          //
          //   jQuery("#firststep_2").hide();

          // });
      });
  </script>

    
    <script>
      jQuery(document).ready(function($) {

        //$("#child-link1").show();

        $(".parent-link").on("click", function() {
            var childOfCategory = $(this).data("child");

            // $(".parent-link").removeClass("is-open");
            $(this).toggleClass("is-open is-closed");

            $("#"+childOfCategory).toggle();
        })
      });
    </script>

  <script type="text/javascript">
      function commonvalidation() {
          var name = document.getElementById("first_name").value;
          var fname = document.getElementById("fname");
          var haserror = false;
          fname.innerHTML = "";
          var expr = /^[a-zA-Z]+$/;
          if (name=='') {
              fname.innerHTML = "אנא ספק שם חוקי";
              haserror = true;
          }

          var lastname = document.getElementById("last_name").value;
          var lname = document.getElementById("lname");

          lname.innerHTML = "";
          var expr = /^[a-zA-Z]+$/;
          if (lastname=='') {
              lname.innerHTML = "אנא ספק שם חוקי";
              haserror = true;
          }



          var parentname = document.getElementById("parent_name").value;
          var parentname = document.getElementById("parentname");

          parentname.innerHTML = "";
          var expr = /^[a-zA-Z]+$/;
          if (parentname=='') {
              parentname.innerHTML = "אנא ספק שם חוקי";
              haserror = true;
          }



          var email = document.getElementById("email").value;
          var lblError = document.getElementById("lblError");

          lblError.innerHTML = "";
          var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
          if (!expr.test(email)) {
              lblError.innerHTML = 'אנא ספק דוא"ל תקף';
              haserror = true;
          }
          var phone = document.getElementById("phone").value;
          var validno = document.getElementById("validno");

          validno.innerHTML = "";
          var expr = /^\d{10}$/;
          if (!expr.test(phone)) {
              validno.innerHTML = "אנא ספק טלפון תקף";
              haserror = true;
          }
          var zip_code = document.getElementById("zip_code").value;
          var ziperror = document.getElementById("ziperror");

          ziperror.innerHTML = "";
          var expr = /^\d+$/;
          if (!expr.test(zip_code)) {
              ziperror.innerHTML = "אנא ספק גיל תקף";
              haserror = true;
          }


          setbuttonstatus(haserror)

          return haserror

      }



      //
      // -----------function firstname() {
      //   var name = document.getElementById("first_name").value;
      //     var fname = document.getElementById("fname");
      //     var haserror = false;
      //     fname.innerHTML = "";
      //     var expr = /^[a-zA-Z]+$/;
      //     if (!expr.test(name)) {
      //         fname.innerHTML = "Please the valid  Name.";
      //          haserror = true;
      //   }
      // setbuttonstatus(haserror)
      //
      // }







      // function lastname() {
      //   var name = document.getElementById("last_name").value;
      //     var lname = document.getElementById("lname");
      //     var haserror = false;
      //     lname.innerHTML = "";
      //     var expr = /^[a-zA-Z]+$/;
      //     if (!expr.test(name)) {
      //         lname.innerHTML = "Please the valid Name.";
      //       haserror = true;
      //   }
      // setbuttonstatus(haserror)
      // }
      //
      //
      //
      // function ValidateEmail() {
      //         var email = document.getElementById("email").value;
      //         var lblError = document.getElementById("lblError");
      //
      //         lblError.innerHTML = "";
      //         var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      //         if (!expr.test(email)) {
      //             lblError.innerHTML = "Invalid email address.";
      //           haserror = true;
      //         }
      // setbuttonstatus(haserror)
      //     }
      //
      //
      // function phonevalidate() {
      //   var phone = document.getElementById("phone").value;
      //   var validno = document.getElementById("validno");
      //
      //   validno.innerHTML = "";
      //   var expr =/^\d{10}$/;
      //   if (!expr.test(phone)) {
      //       validno.innerHTML = "Please fill the valid Phone No.";
      //       haserror = true;
      //   }
      // setbuttonstatus(haserror)
      // }
      //
      //
      // function zipcodevalidate() {
      //   var zip_code = document.getElementById("zip_code").value;
      //   var ziperror = document.getElementById("ziperror");
      //   var haserror = false;
      //   ziperror.innerHTML = "";
      //   var expr =/^\d{6}$/;
      //   if (!expr.test(zip_code)) {
      //       ziperror.innerHTML = "Please fill the valid Zipe Code No.";
      //       haserror = true;
      //   }
      //
      //   setbuttonstatus(haserror)
      //
      //
      //---------------- }



      function setbuttonstatus(haserror) {
          if (haserror) {
              document.getElementById("firststep_2").disabled = true;
          } else {
              document.getElementById("firststep_2").disabled = false;
          }
      }
      // 
  </script>




  <script>
      $(document).ready(function() {
          var max_fields_limit = 20;
          var x = 3;

          $('#add_field_mobileview').click(function(e) {
              e.preventDefault();
              if (x < max_fields_limit) {
                  x++;
                  $('.mobiletable').append(`<tr class="remove_field">
              <tr>
                   <th>Start Date</th>
                  <th>End Date</th>
                  </tr>

                 <tr>
              <td><input type="date" class="form-control start_date " name="start_date[]"  placeholder="start date" value="">
              </td>
              <td><input type="date" class="form-control start_date " name="end_date[]"  placeholder="End date" value=""></td>
              </tr>

               <tr>
                  <th>Start Time</th>
                 <th>End Time</th>
                  <th>Total Hours</th>

                </tr>
                  <tr>
                    <td><input type="time" class="form-control" name="start_time[]"  placeholder="start Time" ></td>
                    <td><input type="time" class="form-control" name="end_time[]"  placeholder="End Time"></td>
                 <td><input type="text" class="form-control" name="start_houre[]"  placeholder="hrs" value=""></td>

              <td class=""><button type="button" class="btn btn-danger delete-row" style="padding: 0; background: transparent; color: red; border:0;"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
            </tr>`);

                  //add input field
              }
          });
          $(document).on("click", ".delete-row", function(e) { //user click on remove text links
              e.preventDefault();


              var currentTr = $(this).parent().parent();

              var prevTr = currentTr.prev('tr');

              var prevPrevTr = prevTr.prev('tr');

              var prevPrevPrevTr = prevPrevTr.prev('tr');

              prevPrevPrevTr.remove();
              prevPrevTr.remove();
              prevTr.remove();
              currentTr.remove();
          })

      });
  </script>