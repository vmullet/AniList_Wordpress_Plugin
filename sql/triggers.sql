DELIMITER |

CREATE TRIGGER after_insert_animelist AFTER INSERT ON wp_anilist_animelist FOR EACH ROW

BEGIN

IF NEW.total_episodes IS NOT NULL THEN
UPDATE wp_anilist_profile SET wp_anilist_profile.nb_episodes_total= wp_anilist_profile.nb_episodes_total + NEW.total_episodes WHERE wp_anilist_profile.id=84316;
END IF;
IF NEW.duration IS NOT NULL THEN
UPDATE wp_anilist_profile SET wp_anilist_profile.nb_duration_total= wp_anilist_profile.nb_duration_total + (NEW.duration*NEW.total_episodes) WHERE wp_anilist_profile.id=84316;
END IF;

END |

DELIMITER ;