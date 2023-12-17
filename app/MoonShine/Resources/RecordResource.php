<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use App\Models\Record;

use MoonShine\Fields\Date;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class RecordResource extends ModelResource
{
    protected string $model = Record::class;

    protected string $title = 'Records';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Enum::make('Статус', 'status')
                    ->attach(StatusEnum::class),
                Date::make('Дата и время', 'start')
                            ->withTime(),
                Text::make('Комментарий', 'comment'),

                BelongsTo::make(
                    'Клиент',
                    'client',
                    fn($item) => "$item->last_name $item->name",
                    new ClientResource())
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
