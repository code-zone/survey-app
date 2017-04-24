 <div id="nav">
                <nav ui-nav>
                  <ul class="nav">
                    <li>
                      <a md-ink-ripple href="{{ url('home') }}">
                        <i class="icon mdi-action-settings-input-svideo i-20"></i>
                        <span class="font-normal">Dashboard</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple href="{{ url('projects') }}">
                        <i class="icon mdi-av-radio i-20"></i>
                        <span class="font-normal">Surveys</span>
                      </a>
                    </li>
                    @is('Admin')
                    <li>
                      <a md-ink-ripple href="{{ route('metrics.index') }}">
                        <i class="icon mdi-action-trending-up i-20"></i>
                        <span class="font-normal">Metrics</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple href="{{ route('users.index') }}">
                        <i class="icon mdi-action-account-child i-20"></i>
                        <span class="font-normal">Users</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple href="ui.chart.html">
                        <i class="icon mdi-device-multitrack-audio i-20"></i>
                        <span class="font-normal">Analytics</span>
                      </a>
                    </li>
                    <li class="b-b b m-v-sm"></li>
                    @endis
                    <li>
                      <a md-ink-ripple href="{{route('users.show', Auth::user()->id)}}">
                        <i class="icon mdi-action-perm-identity i-20"></i>
                        <span class="font-normal">Profile</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>