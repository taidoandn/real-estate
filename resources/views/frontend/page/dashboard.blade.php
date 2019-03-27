@extends('frontend.master')
@section('content')

    <div id="wrapper">
        @include('frontend.partial._sidebar')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">12</div>
                                    <div>Approved ads</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">0</div>
                                    <div>Pending ads</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">0</div>
                                    <div>Blocked ads</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">7</div>
                                    <div>Agents</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">2</div>
                                    <div>Reports</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge">9</div>
                                    <div>Successful payments</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="huge"> 88.00 <sup>EUR</sup></div>
                                    <div>Total Payment</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Latest 10 contact messages </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sender</th>
                                    <th>Message</th>
                                </tr>

                                <tr>
                                    <td>
                                        <i class="fa fa-user"></i> Md Hossain Shohel <br />
                                        <i class="far fa-envelope-o"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="721f1a011a1d1a171e4a4b32151f131b1e5c111d1f">[email&#160;protected]</a>
                                        <br />
                                        <i class="fa fa-clock-o"></i> 2 years ago
                                    </td>
                                    <td>Hi
                                        From Contact Message</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-user"></i> Md Hossain Shohel <br />
                                        <i class="fa fa-envelope-o"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="563839383316333b373f3a7835393b">[email&#160;protected]</a>
                                        <br />
                                        <i class="fa fa-clock-o"></i> 2 years ago
                                    </td>
                                    <td>This is a message
                                        Please reply me</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Latest 10 ads report </div>
                        <div class="panel-body">

                            <table class="table table-bordered table-striped table-responsive">
                                <tr>
                                    <th>Reason</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Ad Info</th>
                                </tr>

                                <tr>
                                    <td>unavailable</td>
                                    <td> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="09686d646067496d6c6466276a6664">[email&#160;protected]</a>
                                    </td>
                                    <td>
                                        This is fraud ads
                                        <hr />
                                        <p class="text-muted"> <i>Date Time: 30/12/2016 4:21 PM</i></p>
                                    </td>
                                    <td>
                                        <a href="https://demo.themeqx.com/themeqxestate/ad/cheap-flat-at-9th-floor-with-lift"
                                            target="_blank">View ad</a>
                                        <i class="clearfix"></i>
                                        <a href="https://demo.themeqx.com/themeqxestate/dashboard/u/posts/reports-by/cheap-flat-at-9th-floor-with-lift">
                                            <i class="fa fa-exclamation-triangle"></i> Reports : 1
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>offensive</td>
                                    <td> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0e7b7d6b7c4e6f7e6b76206d6163">[email&#160;protected]</a>
                                    </td>
                                    <td>
                                        This ad has an offensive content, please take a look
                                        Many Thanks
                                        <hr />
                                        <p class="text-muted"> <i>Date Time: 18/08/2016 6:16 PM</i></p>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('layout\frontend\css\admin.css') }}">
<link rel="stylesheet" href="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.css') }}">
@endsection
@section('js')
<script src="{{ asset('layout\frontend\plugins\metisMenu\dist\metisMenu.min.js') }}"></script>
<script>
    $(function () {
        $('#side-menu').metisMenu();
    });
</script>
@endsection
