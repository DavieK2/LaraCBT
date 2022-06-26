@extends('backend.layouts.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <!--START - Grid of tablo statistics-->
                <div class="element-wrapper">
                    <div class="element-actions">
                        <form class="form-inline justify-content-sm-end">
                            <select class="form-control form-control-sm rounded">
                                <option value="Pending">
                                    Today
                                </option>
                                <option value="Active">
                                    Last Week
                                </option>
                                <option value="Cancelled">
                                    Last 30 Days
                                </option>
                            </select>
                        </form>
                    </div>
                    <h6 class="element-header">
                        Overview
                    </h6>
                    <div class="element-content">
                        <div class="tablo-with-chart">
                            <div class="row">
                                <div class="col-sm-5 col-xxl-4">
                                    <div class="tablos">
                                        <div class="row mb-xl-2 mb-xxl-3">
                                            <div class="col-sm-12">
                                                <a class="element-box el-tablo centered trend-in-corner padded bold-label"
                                                    href="#">
                                                    <div class="value">
                                                        24
                                                    </div>
                                                    <div class="label">
                                                        Total Schools
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a class="element-box el-tablo centered trend-in-corner padded bold-label"
                                                    href="#">
                                                    <div class="value">
                                                        52
                                                    </div>
                                                    <div class="label">
                                                        Total Students Registered This Term
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 col-xxl-8">
                                    <!--START - Chart Box-->
                                    <div class="element-box pl-xxl-5 pr-xxl-5">
                                        <div class="el-tablo bigger highlight bold-label">
                                            <div class="value">
                                                12,537
                                            </div>
                                            <div class="label">
                                                Total Students
                                            </div>
                                        </div>
                                        <div class="el-chart-w">
                                            <canvas height="160px" id="lineChart" width="600px"></canvas>
                                        </div>
                                    </div>
                                    <!--END - Chart Box-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END - Grid of tablo statistics-->
            </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-3 ">
            <a class="element-box el-tablo centered trend-in-corner padded bold-label" style="background-color: #370263" href="#">
                <div class="value text-white">
                    24
                </div>
                <div class="label text-white">
                    Total Instructors
                </div>
            </a>
          </div>

          <div class="col-md-3">
            <a class="element-box el-tablo bg-primary centered trend-in-corner padded bold-label" href="#">
                <div class="value text-white">
                    24
                </div>
                <div class="label text-white">
                    Total Reports
                </div>
            </a>
          </div>

          <div class="col-md-3">
            <a class="element-box bg-danger  el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
                <div class="value text-white">
                    24
                </div>
                <div class="label text-white">
                    Total Exams
                </div>
            </a>
          </div>

          <div class="col-md-3">
            <a class="element-box bg-info el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
                <div class="value text-white">
                    24
                </div>
                <div class="label text-white">
                   Total Exams Completed
                </div>
            </a>
          </div>
        </div>


        <div class="row">
            <div class="col-sm-6 col-xxl-6">
                <!--START - Customers with most tickets-->
                <div class="element-wrapper">
                    <div class="element-actions">
                        <form class="form-inline justify-content-sm-end">
                            <select class="form-control form-control-sm rounded">
                                <option value="Pending">
                                    Today
                                </option>
                                <option value="Active">
                                    Last Week
                                </option>
                                <option value="Cancelled">
                                    Last 30 Days
                                </option>
                            </select>
                        </form>
                    </div>
                    <h6 class="element-header">
                        Latest Schools
                    </h6>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table class="table table-lightborder">
                                <thead>
                                    <tr>
                                        <th>
                                            Customer Name
                                        </th>
                                        <th>
                                            Tickets
                                        </th>
                                        <th>
                                            Location
                                        </th>
                                        <th class="text-center">
                                            Status
                                        </th>
                                        <th class="text-right">
                                            Last Reply
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar1.jpg"><span
                                                    class="d-none d-xl-inline-block">John Mayers</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            15
                                        </td>
                                        <td class="text-center">
                                            <img alt="" src="img/flags-icons/us.png" width="25px">
                                        </td>
                                        <td class="text-center">
                                            <div class="status-pill green" data-title="Complete" data-toggle="tooltip">
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <span>Today </span><span class="smaller lighter">1:52pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar2.jpg"><span
                                                    class="d-none d-xl-inline-block">Kelly Brans</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            12
                                        </td>
                                        <td class="text-center">
                                            <img alt="" src="img/flags-icons/ca.png" width="25px">
                                        </td>
                                        <td class="text-center">
                                            <div class="status-pill red" data-title="Cancelled" data-toggle="tooltip">
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <span>Yesterday </span><span class="smaller lighter">5:34pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar3.jpg"><span
                                                    class="d-none d-xl-inline-block">Tim Howard</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            8
                                        </td>
                                        <td class="text-center">
                                            <img alt="" src="img/flags-icons/uk.png" width="25px">
                                        </td>
                                        <td class="text-center">
                                            <div class="status-pill green" data-title="Complete" data-toggle="tooltip">
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <span>Jan 15th </span><span class="smaller lighter">3:14pm</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--END - Customers with most tickets-->
            </div>
            <div class="col-sm-6 col-xxl-6">
                <!--START - Questions per Product-->
                <div class="element-wrapper">
                    <div class="element-actions">
                        <form class="form-inline justify-content-sm-end">
                            <select class="form-control form-control-sm rounded">
                                <option value="Pending">
                                    Today
                                </option>
                                <option value="Active">
                                    Last Week
                                </option>
                                <option value="Cancelled">
                                    Last 30 Days
                                </option>
                            </select>
                        </form>
                    </div>
                    <h6 class="element-header">
                        Latest Instructors
                    </h6>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table class="table table-lightborder">
                                <thead>
                                    <tr>
                                        <th>
                                            Customer Name
                                        </th>
                                        <th>
                                            Tickets
                                        </th>
                                        <th>
                                            Location
                                        </th>
                                        <th class="text-center">
                                            Status
                                        </th>
                                        <th class="text-right">
                                            Last Reply
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar1.jpg"><span
                                                    class="d-none d-xl-inline-block">John Mayers</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            15
                                        </td>
                                        <td class="text-center">
                                            <img alt="" src="img/flags-icons/us.png" width="25px">
                                        </td>
                                        <td class="text-center">
                                            <div class="status-pill green" data-title="Complete" data-toggle="tooltip">
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <span>Today </span><span class="smaller lighter">1:52pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar2.jpg"><span
                                                    class="d-none d-xl-inline-block">Kelly Brans</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            12
                                        </td>
                                        <td class="text-center">
                                            <img alt="" src="img/flags-icons/ca.png" width="25px">
                                        </td>
                                        <td class="text-center">
                                            <div class="status-pill red" data-title="Cancelled" data-toggle="tooltip">
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <span>Yesterday </span><span class="smaller lighter">5:34pm</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar3.jpg"><span
                                                    class="d-none d-xl-inline-block">Tim Howard</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            8
                                        </td>
                                        <td class="text-center">
                                            <img alt="" src="img/flags-icons/uk.png" width="25px">
                                        </td>
                                        <td class="text-center">
                                            <div class="status-pill green" data-title="Complete" data-toggle="tooltip">
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <span>Jan 15th </span><span class="smaller lighter">3:14pm</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--END - Questions per product-->
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-sm-12">
                <!--START - Recent Ticket Comments-->
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Latest Reports
                    </h6>
                    <div class="element-box-tp">
                        <div class="table-responsive">
                            <table class="table table-padded">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            Assigned Agent
                                        </th>
                                        <th>
                                            Last Comment
                                        </th>
                                        <th class="text-center">
                                            Ticket Category
                                        </th>
                                        <th>
                                            Last Reply Date
                                        </th>
                                        <th>
                                            Ticket Status
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <input class="form-control" type="checkbox">
                                        </td>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar1.jpg"><span>John Mayers</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="smaller lighter">
                                                I have enabled the software for you, you can try now...
                                            </div>
                                        </td>
                                        <td>
                                            <span>Today</span><span class="smaller lighter">1:52am</span>
                                        </td>
                                        <td class="text-center">
                                            <a class="badge badge-success-inverted" href="">Shopping</a>
                                        </td>
                                        <td class="nowrap">
                                            <span class="status-pill smaller green"></span><span>Active</span>
                                        </td>
                                        <td class="row-actions">
                                            <a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i
                                                    class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i
                                                    class="os-icon os-icon-ui-15"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <input class="form-control" type="checkbox">
                                        </td>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar2.jpg"><span>Mike Bishop</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="smaller lighter">
                                                Please approve this request so we can move...
                                            </div>
                                        </td>
                                        <td>
                                            <span>Jan 19th</span><span class="smaller lighter">3:22pm</span>
                                        </td>
                                        <td class="text-center">
                                            <a class="badge badge-danger-inverted" href="">Cafe</a>
                                        </td>
                                        <td class="nowrap">
                                            <span class="status-pill smaller red"></span><span>Closed</span>
                                        </td>
                                        <td class="row-actions">
                                            <a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i
                                                    class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i
                                                    class="os-icon os-icon-ui-15"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <input class="form-control" type="checkbox">
                                        </td>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar3.jpg"><span>Terry Crews</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="smaller lighter">
                                                We will need some login credentials to make...
                                            </div>
                                        </td>
                                        <td>
                                            <span>Yesterday</span><span class="smaller lighter">7:45am</span>
                                        </td>
                                        <td class="text-center">
                                            <a class="badge badge-warning-inverted" href="">Restaurants</a>
                                        </td>
                                        <td class="nowrap">
                                            <span class="status-pill smaller yellow"></span><span>Pending</span>
                                        </td>
                                        <td class="row-actions">
                                            <a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i
                                                    class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i
                                                    class="os-icon os-icon-ui-15"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <input class="form-control" type="checkbox">
                                        </td>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar1.jpg"><span>Phil Collins</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="smaller lighter">
                                                I have enabled the software for you, you can try now...
                                            </div>
                                        </td>
                                        <td>
                                            <span>Jan 23rd</span><span class="smaller lighter">2:12pm</span>
                                        </td>
                                        <td class="text-center">
                                            <a class="badge badge-primary-inverted" href="">Shopping</a>
                                        </td>
                                        <td class="nowrap">
                                            <span class="status-pill smaller yellow"></span><span>Pending</span>
                                        </td>
                                        <td class="row-actions">
                                            <a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i
                                                    class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i
                                                    class="os-icon os-icon-ui-15"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <input class="form-control" type="checkbox">
                                        </td>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar4.jpg"><span>Katy Pilsner</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="smaller lighter">
                                                I have tried this solution but it does not open...
                                            </div>
                                        </td>
                                        <td>
                                            <span>Jan 12th</span><span class="smaller lighter">9:51am</span>
                                        </td>
                                        <td class="text-center">
                                            <a class="badge badge-danger-inverted" href="">Groceries</a>
                                        </td>
                                        <td class="nowrap">
                                            <span class="status-pill smaller green"></span><span>Active</span>
                                        </td>
                                        <td class="row-actions">
                                            <a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i
                                                    class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i
                                                    class="os-icon os-icon-ui-15"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <input class="form-control" type="checkbox">
                                        </td>
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar2.jpg"><span>Wes Morgan</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="smaller lighter">
                                                I have enabled the software for you, you can try now...
                                            </div>
                                        </td>
                                        <td>
                                            <span>Jan 9th</span><span class="smaller lighter">12:45pm</span>
                                        </td>
                                        <td class="text-center">
                                            <a class="badge badge-primary-inverted" href="">Business</a>
                                        </td>
                                        <td class="nowrap">
                                            <span class="status-pill smaller yellow"></span><span>Pending</span>
                                        </td>
                                        <td class="row-actions">
                                            <a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i
                                                    class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i
                                                    class="os-icon os-icon-ui-15"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--END - Recent Ticket Comments-->
            </div>
        </div>
        <!--------------------
              START - Color Scheme Toggler
              -------------------->
        darkmode
        <!--------------------
              END - Color Scheme Toggler
              -------------------->
        <!--------------------
            
              -------------------->
        <!--------------------
              START - Chat Popup Box
              -------------------->
        chatbox
        <!--------------------
              END - Chat Popup Box
              -------------------->
    </div>
</div>
@endsection