<div class="flex h-screen">
    <aside class="w-64 bg-black min-h-screen">
        @php
            $currentRoute = Route::currentRouteName();
            
            $links = [
                ['route' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'departments.index', 'label' => 'Departments, Roles and Guides'],
                ['route' => 'behaviorals.index', 'label' => 'Behavioral (Org-Wide)'],
                // ['route' => 'hierarchy.index', 'label' => 'Hierarchy'], // Uncomment when needed
                ['route' => 'general_qualifiers.index', 'label' => 'Subjective Qualifiers (Guides from Job Roles)'],
                ['route' => 'reviews.index', 'label' => 'Reviews'],
                ['route' => 'profile.show', 'label' => 'Profile']
            ];
        @endphp

        <div class="h-16 flex items-center justify-center bg-black text-lg font-semibold">
             Review App Name Here 
        </div>

        <nav class="mt-1">
            <ul class="space-y-1">
                @foreach($links as $link)
                    <li class="px-5">
                        <a href="{{ route($link['route']) }}"
                           class="block px-2 py-4 rounded transition
                               {{ $currentRoute == $link['route'] ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                            {{ $link['label'] }}
                        </a>
                        
                    </li>
                    
                    
                @endforeach
            </ul>
            
        </nav>
    </aside>

    <div class="flex-1 bg-gray-50 overflow-auto">
        {{ $slot }}
    </div>
</div>
