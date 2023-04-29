<main id="permission_container" class="main_content">
    <section class="permission_header">
        <h1>Permission</h1>
        <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="assets/imgs/search.png" alt="">
        </div>
        <div class="add_permission">
            <label for="" class="reload_permission_btn" title=""></label>
            <label for="" class="add_permission_btn" title=""></label>
        </div>

    </section>
    <section class="permission_table">
        <table>
            <thead>
                <tr>
                    <th>Id<span class="icon-arrow">&UpArrow;</span></th>
                    <th>Name<span class="icon-arrow">&UpArrow;</span></th>
                    <th>Actions<span class="icon-arrow">&UpArrow;</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>admin</td>
                    <td>
                        <button class="edit" value="${orders[0].order_id}">Edit</button>
                        <button class="delete" value="${orders[0].order_id}">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>manager</td>
                    <td>
                        <button class="edit" value="${orders[0].order_id}">Edit</button>
                        <button class="delete" value="${orders[0].order_id}">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>customer</td>
                    <td>
                        <button class="edit" value="${orders[0].order_id}">Edit</button>
                        <button class="delete" value="${orders[0].order_id}">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</main>