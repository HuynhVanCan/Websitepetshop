<?php include '../templates/nav_admin1.php' ?>
<div class="search_admin">
    <h1 class="Title_Admin_create_form">Tìm kiếm nhanh</h1>
    <div class="search_admin_header">
        <form action="" method="POST">
            <table class="Table_Details_Admin">
                <tr>
                    <td>
                        <label for="" class="name_form_field">Mã Admin : </label>
                    </td>
                    <td>
                        <input type="text" class="textfile" name="maadmin" value="@ViewBag.MAADMIN">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="name_form_field">Họ tên Admin : </label>
                    </td>
                    <td>
                        <input type="text" class="textfile" id="fullname" name="hoten" value="@ViewBag.HOTEN">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="name_form_field">Số điện thoại : </label>
                    </td>
                    <td>
                        <input type="text" class="textfile" id="phoneNumber" name="dienthoai"
                            value="@ViewBag.DIENTHOAI">
                    </td>
                </tr>


            </table>
            <table class="Table_Details_Admin">
                <tr>
                    <td>
                        <label for="" class="name_form_field">Email : </label>
                    </td>
                    <td>
                        <input type="text" class="textfile" id="email" name="email" value="@ViewBag.EMAIL">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="name_form_field">Loại tài khoản : </label>
                    </td>
                    <td>
                        <select class="textfile" name="maloai">
                            if (ViewBag.MALOAI == null)
                            {
                            <option selected></option>
                            }
                            @foreach (var item in @ViewBag.loaiTk)
                            {
                            if (item.MALOAI == ViewBag.MALOAI)
                            {
                            <option value="@item.MALOAI" selected>@item.TENLOAI</option>
                            }
                            else
                            {
                            <option value="@item.MALOAI">@item.TENLOAI</option>
                            }
                            }
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="name_form_field">Địa chỉ : </label>
                    </td>
                    <td>
                        <textarea class="textfile_address" cols="2" id="address"
                            name="diachi">@ViewBag.DIACHI</textarea>
                    </td>
                </tr>
            </table>
            <div class="search_button">
                <input type="submit" value="Tìm kiếm" class="search_button_btn" />
                <a href="@Url.Action(" Search","Admin")"><input type="button" value="Nhập lại"
                        class="search_button_btn" /></a>
            </div>
        </form>

    </div>
    @if (ViewBag.TB == null)
    {
    <table class="table_dsadmin">
        <thead>
            <tr>
                <th style="width: 65px;">Mã Admin</th>
                <th style="width: 120px;">Họ tên Admin</th>
                <th style="width: 150px;">Địa chỉ</th>
                <th style="width: 80px;">Số điện thoại</th>
                <th style="width: 90px;">Loại tài khoản</th>
                <th style="width: 100px;">Tên đăng nhập</th>
                <th style="width: 75px;">Hình ảnh</th>
                <th style="width: 150px;">Email</th>
                <th style="width: 80px;">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach (var item in Model)
            {
            <tr>
                <td>
                    @Html.DisplayFor(modelItem => item.MAADMIN)
                </td>
                <td>
                    @Html.DisplayFor(modelItem => item.HOTEN)
                </td>
                <td>
                    @Html.DisplayFor(modelItem => item.DIACHI)
                </td>
                <td>
                    @Html.DisplayFor(modelItem => item.DIENTHOAI)
                </td>
                <td>
                    @Html.DisplayFor(modelItem => item.LOAITKADMIN.TENLOAI)
                </td>
                <td>
                    @Html.DisplayFor(modelItem => item.TENDN)
                </td>
                <td>
                    <img src="@Url.Content(" ~/assest/img/ad_user/" + item.AVATAR)" alt=""
                        style="width: 70px; height: 70px;">
                </td>
                <td>
                    @Html.DisplayFor(modelItem => item.EMAIL)
                </td>
                <td>
                    <a href="@Url.Action(" Edit","Admin", new { id=item.MAADMIN })"><i
                            class="fa-solid fa-pen-to-square edit"></i></a>
                    <a href="@Url.Action(" Delete","Admin", new { id=item.MAADMIN })"> <i
                            class="fa-solid fa-xmark remove"></i></a>
                    <a href="@Url.Action(" Detail","Admin", new { id=item.MAADMIN })"><i
                            class="fa-solid fa-circle-info detail"></i></a>
                </td>
            </tr>
            }


        </tbody>
    </table>
    <ul class="page">
        @if (Model.PageCount > 1)
        {
        for (int i = 1; i <= Model.PageCount; i++) { <li>
            <a href="@Url.Action(" Search", new { page=i })" class="@((i == Model.PageNumber) ? " page_button
                page_button_active" : "page_button" )">@i</a>
            </li>
            }
            }
    </ul>
    } else
    {
    <h1 class="message_not_found">@ViewBag.TB</h1>
    }

</div>


<?php include '../templates/nav_admin2.php' ?>