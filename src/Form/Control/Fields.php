<?php

declare(strict_types=1);

namespace Atk4\Login\Form\Control;

use Atk4\Data\Field;
use Atk4\Data\Model;

class Fields extends GenericDropdown
{
    public function setModel(Model $model): void
    {
        $this->renderRowFunction = function (Field $field) {
            return [
                'value' => $field->shortName,
                'title' => $field->getCaption(),
                // 'icon' => ($field->shortName == $field->model->idField ? 'key' : null), // cannot get field->model here :(
            ];
        };

        parent::setModel($model);
    }

    protected function renderView(): void
    {
        $model = $this->getModel();
        if ($model) {
            $fields = array_keys($model->getFields());
            $this->values = array_combine($fields, $fields);
        }

        parent::renderView();
    }
}
