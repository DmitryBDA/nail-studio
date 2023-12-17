<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Pages\CalendarPage;
use App\MoonShine\Resources\RecordResource;
use MoonShine\Pages\ViewPage;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ]),

            MenuGroup::make('Записи', [
                MenuItem::make(
                    'Записи',
                    new RecordResource()
                ),
            ]),

            //MenuItem::make('Calendar page', CalendarPage::make('Calendar page', 'calendar_page')),
            MenuItem::make(
                'Calendar page',
                ViewPage::make()
                    ->setTitle('Hello')
                    ->setContentView('pages.calendar')
            ),

            MenuItem::make('Documentation', 'https://moonshine-laravel.com')
               ->badge(fn() => 'Check'),
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
