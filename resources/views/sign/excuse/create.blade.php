@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>请假
                            <small>Sessions</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="form-horizontal form-label-left">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">姓名</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" readonly="readonly"
                                           value="{{ $auth->userInfo->real_name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">学号</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" readonly="readonly"
                                           value="{{ $auth->student_id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">请假原因 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" rows="3" placeholder="请假原因"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">开始日期</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal2"
                                           placeholder="First Name" aria-describedby="inputSuccess2Status2">
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Input Tags</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input size="16" type="text" id="datetimeStart" readonly class="form_datetime">
                                    --
                                    <input size="16" type="text" id="datetimeEnd" readonly class="form_datetime">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Checkboxes and radios
                                    <br>
                                    <small class="text-navy">Normal Bootstrap elements</small>
                                </label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Option one. select more than one options
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Option two. select more than one options
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" checked="" value="option1" id="optionsRadios1"
                                                   name="optionsRadios"> Option one. only select one option
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="option2" id="optionsRadios2"
                                                   name="optionsRadios"> Option two. only select one option
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Checkboxes and radios
                                    <br>
                                    <small class="text-navy">Normal Bootstrap elements</small>
                                </label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green checked" style="position: relative;"><input
                                                        type="checkbox" class="flat" checked="checked"
                                                        style="position: absolute; visibility: hidden;">
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            Checked
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;"><input
                                                        type="checkbox" class="flat"
                                                        style="position: absolute; visibility: hidden;">
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            Unchecked
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <div class="icheckbox_flat-green disabled" style="position: relative;">
                                                <input type="checkbox" class="flat" disabled="disabled"
                                                       style="position: absolute; visibility: hidden;">
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            Disabled
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <div class="icheckbox_flat-green checked disabled"
                                                 style="position: relative;"><input type="checkbox" class="flat"
                                                                                    disabled="disabled"
                                                                                    checked="checked"
                                                                                    style="position: absolute; visibility: hidden;">
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            Disabled &amp; checked
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <div class="iradio_flat-green checked" style="position: relative;"><input
                                                        type="radio" class="flat" checked="" name="iCheck"
                                                        style="position: absolute; visibility: hidden;">
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            Checked
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <div class="iradio_flat-green" style="position: relative;"><input
                                                        type="radio" class="flat" name="iCheck"
                                                        style="position: absolute; visibility: hidden;">
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            Unchecked
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <div class="iradio_flat-green disabled" style="position: relative;"><input
                                                        type="radio" class="flat" name="iCheck" disabled="disabled"
                                                        style="position: absolute; visibility: hidden;">
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            Disabled
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <div class="iradio_flat-green checked disabled" style="position: relative;">
                                                <input type="radio" class="flat" name="iCheck3" disabled="disabled"
                                                       checked="" style="position: absolute; visibility: hidden;">
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            Disabled &amp; Checked
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Switch</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="">
                                        <label>
                                            <input type="checkbox" class="js-switch" checked="" data-switchery="true"
                                                   style="display: none;"><span class="switchery switchery-default"
                                                                                style="background-color: rgb(38, 185, 154); border-color: rgb(38, 185, 154); box-shadow: rgb(38, 185, 154) 0px 0px 0px 11px inset; transition: border 0.4s, box-shadow 0.4s, background-color 1.2s;"><small
                                                        style="left: 12px; background-color: rgb(255, 255, 255); transition: background-color 0.4s, left 0.2s;"></small></span>
                                            Checked
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" class="js-switch" data-switchery="true"
                                                   style="display: none;"><span class="switchery switchery-default"
                                                                                style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s, box-shadow 0.4s;"><small
                                                        style="left: 0px; transition: background-color 0.4s, left 0.2s;"></small></span>
                                            Unchecked
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" class="js-switch" disabled="disabled"
                                                   data-switchery="true" readonly="" style="display: none;"><span
                                                    class="switchery switchery-default"
                                                    style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s, box-shadow 0.4s; opacity: 0.5;"><small
                                                        style="left: 0px; transition: background-color 0.4s, left 0.2s;"></small></span>
                                            Disabled
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" class="js-switch" disabled="disabled"
                                                   checked="checked" data-switchery="true" readonly=""
                                                   style="display: none;"><span class="switchery switchery-default"
                                                                                style="background-color: rgb(38, 185, 154); border-color: rgb(38, 185, 154); box-shadow: rgb(38, 185, 154) 0px 0px 0px 11px inset; transition: border 0.4s, box-shadow 0.4s, background-color 1.2s; opacity: 0.5;"><small
                                                        style="left: 12px; background-color: rgb(255, 255, 255); transition: background-color 0.4s, left 0.2s;"></small></span>
                                            Disabled Checked
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $("#datetimeStart").datetimepicker({
            format: 'yyyy-mm-dd',
            minView: 'month',
            language: 'zh-CN',
            autoclose: true,
            startDate: new Date()
        }).on("click", function () {
            $("#datetimeStart").datetimepicker("setEndDate", $("#datetimeEnd").val())
        });
        $("#datetimeEnd").datetimepicker({
            format: 'yyyy-mm-dd',
            minView: 'month',
            language: 'zh-CN',
            autoclose: true,
            startDate: new Date()
        }).on("click", function () {
            $("#datetimeEnd").datetimepicker("setStartDate", $("#datetimeStart".val()))
        });
    </script>
@endsection
