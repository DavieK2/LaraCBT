@extends('backend.layouts.app')
@section('content')
<div class="content-i">
    <div class="content-box">
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
    </div>
</div>
@endsection