<?php

declare(strict_types=1);

namespace G4M\Application\Formatters;

use Monolog\Formatter\NormalizerFormatter;

final class G4mStandardFormatter extends NormalizerFormatter
{
    public function __construct()
    {
        parent::__construct(\DateTimeInterface::RFC3339_EXTENDED);
    }

    /**
     * {@inheritdoc}
     */
    public function format(array $record): string
    {
        /** @var array $record */
        $record = parent::format($record);

        $message = [];

        $date = new \DateTime();
        $dateFormat = $date->format('y:m:d h:i:s');

        $message['datetime'] = $dateFormat;

        if (isset($record['level_name'])) {
            /** @var int $levelName */
            $levelName = $record['level_name'];
            $message['level'] = $levelName;
        }

        if (isset($record['message'])) {
            /** @var string $msg */
            $msg = $record['message'];
            $message['message'] = $msg;
        }

        if (!empty($record['context'])) {
            /** @var array $context */
            $context = $record['context'];

            /** @var string $value */
            foreach ($context as $key => $value) {
                $message[$key] = $value;
            }
        }
        if (!empty($record['extra'])) {
            /** @var int $extra */
            $extra = $record['extra'];
            $message['extra'] = $extra;
        }

        return $this->toJson($message)."\n";
    }
}
