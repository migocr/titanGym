<?php $dataPerPage = 50; ?>
<nav aria-label="Page navigation example" class="<?php echo $enablePaginator == true ? '' : 'd-none' ?>">

    <ul class="pagination justify-content-center">
        <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : 'enabled'; ?> ">
            <a class="page-link"
                href="<?php echo $currentPage == 1 ? 'javascript:;' : 'members.php?page=' . $prevPage; ?>"
                tabindex="-1">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php
        $pages = ceil($totalData / $dataPerPage);

        for ($i = 1; $i <= $pages; $i++) {
            $active = $currentPage == $i ? "active" : "";
            echo "<li class='page-item $active'><a class='page-link' href='$pageLink?page=$i'>$i</a></li>";

        }
        ?>

        <li class="page-item <?php echo $currentPage == $pages ? 'disabled' : 'enabled' ?>">
            <a class="page-link"
                href="<?php echo $currentPage == $pages ? 'javascript:;' : 'members.php?page=' . $nextPage; ?>">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
<style>
    .page-item.active .page-link {
      background:
        <?php echo $principalColor ?>
        !important;
      border-color: gray !important;
      color: white;
    }

    .page-item.disabled {
      filter: opacity(0.3);
    }
  </style>