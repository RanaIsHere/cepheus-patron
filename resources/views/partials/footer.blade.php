<div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-6 col-md-3">
              <ul class="list-unstyled mb-0">
                <li><a href="#">LinkedIn</a></li>
                <li><a href="#">Corporation Website</a></li>
              </ul>
            </div>
            <div class="col-6 col-md-3">
              <ul class="list-unstyled mb-0">
                @if (Auth::user()->level == 'ADMIN')
                  <li><a href="/dashboard/register">Registration</a></li>
                @else
                  <li><a href="/logout">Sign out</a></li>
                @endif
                  <li><a href="/dashboard/settings">Settings</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
            Cepheus Patron is a mini-market owned by the Origin Corporation, and this editor has specified usages for running a mini-market specified for Cepheus Patron. Please do keep in mind that this is a proprietary tool.
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center flex-row-reverse">
        <div class="col-auto ml-lg-auto">
          <div class="row align-items-center">
            <div class="col-auto">
              <a href="https://github.com/RanaIsHere/cepheus-patron/wiki/Setup" class="btn btn-outline-primary btn-sm">Documentation</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
          Copyright (C) Rana Rosihan 2019-2022
        </div>
      </div>
    </div>
  </footer>
  </div>