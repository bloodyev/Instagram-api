<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * StoryQuizAnswersResponse.
 *
 * @method mixed getMessage()
 * @method Model\StoryQuestionResponderInfos getParticipantInfo()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isMessage()
 * @method bool isParticipantInfo()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setMessage(mixed $value)
 * @method $this setParticipantInfo(Model\StoryQuestionResponderInfos $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetMessage()
 * @method $this unsetParticipantInfo()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class StoryQuizAnswersResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'participant_info' => 'Model\StoryQuestionResponderInfos',
    ];
}
