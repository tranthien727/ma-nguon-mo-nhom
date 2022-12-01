
<?php include '../Admin/partials/header.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <div class="main-content">
      <div class="wrapper">
          
          <form action="config.php" method="POST" style="border: 1px solid #84817a; width: 70%;">
            <table style="width: 100%;">
              <th colspan="2">Enter your information</th>
              <tr>
                <td>Full name: </td>
                <td>
                  <input type="text" name="ten">
                </td>
              </tr>
              <tr>
                <td>Address: </td>
                <td><input type="text" name="diachi"></td>
              </tr>
              <tr>
                <td>Phone: </td>
                <td>
                  <input type="text" name="dienthoai">
                </td>
              </tr>
              <tr>
                <td>Gender: </td>
                <td>
                  <input type="radio" name="gioitinh" value="Nam" checked> Nam
                  <input type="radio" name="gioitinh" value="Nu"> Nữ
                </td>
              </tr>
              <tr>
                <td>Country: </td>
                <td>
                  <select name="quocgia">
                    <option value="Việt Nam" selected>Việt Nam</option>
                    <option value="Mỹ">Mỹ</option>
                    <option value="Hàn Quốc">Hàn Quốc</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Study: </td>
                <td>
                  <input type="checkbox" value="PHP & MySQL" name="hocvan" checked> PHP & MySQL
                  <input type="checkbox" value="ASP.NET" name="hocvan"> ASP.NET
                  <input type="checkbox" value="CCNA" name="hocvan"> CCNA
                  <input type="checkbox" value="Security+" name="hocvan"> Security+
                </td>
              </tr>
              <tr>
                <td>Note: </td>
                <td>
                  <textarea name="note" rows="5"></textarea>
                </td>
              </tr>
              <tr>
                <td>     </td>
                <td>
                  <input type="submit" name="submit" value="Gửi">     
                  <input type="reset" name="reset" value="Hủy">
                </td>
              </tr>

            </table>
          </form>
      </div>
  </div>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    