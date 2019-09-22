<!-- Sidebar -->
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="${root}">
                            <span data-feather="home"></span>
                            Home <!--<span class="sr-only">(current)</span>-->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <c:if test="${title == 'My Account'}">active</c:if>" href="${root}/account">
                        <span data-feather="user"></span>
                        My Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <c:if test="${title == 'My Visits'}">active</c:if>" href="${root}/care/visits">
                        <span data-feather="clipboard"></span>
                        My Visits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <c:if test="${title == 'My Treatments'}">active</c:if>" href="${root}/care/treatments">
                        <span data-feather="activity"></span>
                        My Treatments
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

