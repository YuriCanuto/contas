<?php

namespace App\Traits;

trait DTO
{
    /**
     * @param  array  $data
     * @return class-string<\App\DTO\Organizacao\CreateOrganizacaoDTO>
     */
    public function registrar(array $data)
    {
        $data = $this->customizar($data);

        foreach (array_keys(get_class_vars(__CLASS__)) as $value) {
            $this->{$value} = data_get($data, $value);
        }

        return self::class;
    }

    /** @return array */
    public function toArray(array $exception = [])
    {
        if (! empty($exception)) {
            foreach ($exception as $item) {
                unset($this->{$item});
            }
        }

        return (array) $this;
    }

    /**
     * @param  array  $data
     * @return array
     */
    public function customizar(array $data): array
    {
        return $data;
    }
}
